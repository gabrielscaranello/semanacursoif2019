<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Storage;
use Image;
use Hash;

class UserController extends Controller
{
    public function list()
    {
        $user = User::where('status', 1)->orderBy('created_at', 'DESC')->get();
        if ($user) {
            return ['status' => 'success', 'data' => $user];
        }
        return ['status' => 'error'];
    }

    public function print()
    {
        $user = User::where('status', 1)->orderBy('name', 'ASC')->get();
        if ($user) {
            foreach ($user as $key => $value) {
                $user[$key]->turma = $value->turma == null ? "": $value->turma;
                $user[$key]->ano = $value->ano == null ? "": $value->ano;
                $user[$key]->assinatura = "";
            }
            return ['status' => 'success', 'data' => $user];
        }
        return ['status' => 'error'];
    }

    public function getItem(Request $request)
    {
        $user = User::where(['status' => 1, 'id' => $request->id])->first();
        if ($user) {
            return ['status' => 'success', 'data' => $user];
        }
        return ['status' => 'error'];
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if (User::create($data)) {
            return ['status' => 'success'];
        }
        return ['status' => 'error'];
    }



    public function update(Request $request)
    {
        $data = $request->all();
        $user = User::where('id', $request->id)->first();

        if ($user) {
            if (isset($data['password'])) {
                if (!Hash::check($request->current_password, $user->password)) {
                    return ['status'=>'error', 'msg' => 'Senha atual não confere'];
                }
                $data['password'] = Hash::make($request->password);
                $data['token'] = '';
            }

            if ($user->update($data)) {
                return ['status' => 'success'];
            }
            return ['status'=>'error', 'msg' => 'Ocorreu um erro, tente novamente mais tarde'];
        }
        return ['status'=>'error', 'msg' => 'Ocorreu um erro, tente novamente mais tarde'];
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        $user = User::where('id', $request->id)->first();
        $user->status = -1;
        if ($user->update($data)) {
            return ['status' => 'success'];
        }
        return ['status' => 'error'];
    }




    // upload de imagem
    public function uploadAvatar(Request $request)
    {
        $data =  $request->all();
        if (isset($data['avatar'])) {
            $size = 400;
            $height = null;
            $init = 'A';
            if (isset($data['id'])) {
                $user = User::where('id', $data['id'])->first();
                $init = $user->id;
            }
            $data['avatar'] = $this->resizeImage($this->base64_to_jpeg($data['avatar'], $init), $size, $height);
            if ($data['avatar']) {
                return ['status'=> 'success', 'avatar' =>$data['avatar']];
            }
            return ['status'=> 'error'];
        }
    }


    public function resizeImage($image_name, $width, $height = null)
    {
        $image = Image::make(sprintf('uploads/avatar/%s', $image_name))->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save();
        return '/uploads/avatar/'.$image_name;
    }

    public function base64_to_jpeg($base64_string, $user_id)
    {
        $time = time();

        $output_file = "$user_id-$time.jpg";


        //Livrar-se de tudo até a última vírgula
        $base64_string = substr($base64_string, 1 + strrpos($base64_string, ','));

        // ACESSANDO O DISCO
        $diskimagem = Storage::disk('avatar');
        $diskimagem->put($output_file, base64_decode($base64_string));

        return $output_file;
    }
}
