<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MiniCurso;
use App\Models\User;
use App\Models\MiniCursoHasUser;
use Storage;
use Image;

class MiniCursoController extends Controller
{
    public function list()
    {
        $minicurso = MiniCurso::where('status', 1)->get();
        if ($minicurso) {
            foreach ($minicurso as $key => $value) {
                $minicurso[$key]->namepainel = $value->name . ' - '. $value->turma;
            }
            return ['status' => 'success', 'data' => $minicurso];
        }
        return ['status' => 'error'];
    }

    public function inscrever(Request $request)
    {
        if ($request->id_curso && $request->id_user) {
            $usercurso = MiniCursoHasUser::where(['id_user'=> $request->id_user,'id_curso'=> $request->id_curso])->get();
            if (!(sizeof($usercurso) > 0)) {
                $data = $request->all();
                $count = MiniCursoHasUser::where('id_curso', $request->id_curso)->count();
                $vagas = MiniCurso::where('id', $request->id_curso)
                ->select('mini_cursos.vagas')->first();
                if ($count < $vagas->vagas) {
                    $minicurso = MiniCursoHasUser::create($data);
                    if ($minicurso) {
                        return ['status' => 'success', 'data'=> $minicurso];
                    }
                    return ['status' => 'error', 'msg' => 'Desculpe, ocorreu um erro, tente novamente mais tarde.'];
                }
                return ['status'=>'error', 'msg'=> 'Este minicurso já exedeu o limite de vagas disponíveis.'];
            }
            return ['status'=>'error', 'msg'=> 'Você já está cadastrado nesse minicurso.'];
        }
        return ['status' => 'error', 'msg' => 'Desculpe, ocorreu um erro, tente novamente mais tarde.'];
    }

    public function miniCursosHasUser(Request $request)
    {
        $miniCursos = MiniCursoHasUser::where('id_user', $request->user_id)
      ->select('mini_cursos.*', 'mini_curso_has_users.id as id_inscricao', 'mini_curso_has_users.id_curso')
      ->join('mini_cursos', 'mini_cursos.id', '=', 'mini_curso_has_users.id_curso')
      ->orderBy('name', 'ASC')->get();

        if ($miniCursos) {
            return ['status' => 'success', 'data' => $miniCursos];
        }
    }

    public function show()
    {
        $minicurso = MiniCurso::where('status', 1)->orderBy('name', 'ASC')->get();
        if ($minicurso) {
            foreach ($minicurso as $key => $value) {
                $data = $value->day;
                $data = explode('-', $data);
                $data = $data[2].'/'.$data[1].'/'.$data[0];
                $minicurso[$key]->day = $data;
                $minicurso[$key]->vagas_preenchidas = MiniCursoHasUser::where('id_curso', $value->id)->count();
            }
            return ['status' => 'success', 'data' => $minicurso];
        }
        return ['status' => 'error'];
    }

    public function getItem(Request $request)
    {
        $minicurso = MiniCurso::where(['status' => 1, 'id' => $request->id])->first();
        return ['status' => 'success', 'data' => $minicurso];
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if (MiniCurso::create($data)) {
            return ['status' => 'success'];
        }
        return ['status' => 'error'];
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $minicurso = MiniCurso::where('id', $request->id)->first();
        if ($minicurso->update($data)) {
            return ['status' => 'success'];
        }
        return ['status' => 'error'];
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        $minicurso = MiniCurso::where('id', $request->id)->first();
        $minicurso->status = -1;
        if ($minicurso->update($data)) {
            return ['status' => 'success'];
        }
        return ['status' => 'error'];
    }


    public function miniCursosHasUserDel(Request $request)
    {
        $minicurso = MiniCursoHasUser::where('id', $request->id)->first();
        if ($minicurso->delete()) {
            return ['status' => 'success'];
        }
        return ['status' => 'error'];
    }

    public function matricula(Request $request)
    {
        if (isset($request->id)) {
            $matriculas = MiniCursoHasUser::where('mini_curso_has_users.id_curso', $request->id)
            ->select('users.name', 'users.curso', 'users.ano', 'mini_curso_has_users.*', 'mini_curso_has_users.created_at as inscricao')
            ->join('users', 'mini_curso_has_users.id_user', '=', 'users.id')
            ->orderBy('users.name', 'ASC')->get();
        } else {
            $matriculas = User::select('users.*')->orderBy('name', 'ASC')->get();
        }
        return ['data' => $matriculas];
    }


    // função da chamada
    public function presenca(Request $request)
    {
        $data = $request->all();
        $minicurso = MiniCursoHasUser::where('id', $request->id)->first();
        if ($minicurso->update($data)) {
            return response()->json($minicurso->presenca);
        }
    }

    // upload de imagem
    public function uploadBanner(Request $request)
    {
        $data =  $request->all();
        if (isset($data['image'])) {
            $size = 400;
            $data['image'] = $this->resizeImage($this->base64_to_jpeg($data['image'], 'N'), $size, null);
            if ($data['image']) {
                return ['status'=> 'success', 'image' =>$data['image']];
            }
            return ['status'=> 'error'];
        }
    }


    public function resizeImage($image_name, $width, $height = null)
    {
        $image = Image::make(sprintf('uploads/image/%s', $image_name))->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save();
        return '/uploads/image/'.$image_name;
    }

    public function base64_to_jpeg($base64_string, $user_id)
    {
        $time = time();

        $output_file = "$user_id-$time.jpg";


        //Livrar-se de tudo até a última vírgula
        $base64_string = substr($base64_string, 1 + strrpos($base64_string, ','));

        // ACESSANDO O DISCO
        $diskimagem = Storage::disk('image');
        $diskimagem->put($output_file, base64_decode($base64_string));

        return $output_file;
    }
}
