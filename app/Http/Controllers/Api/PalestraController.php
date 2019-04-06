<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Palestra;
use Storage;
use Image;

class PalestraController extends Controller
{
    public function list()
    {
        $minicurso = Palestra::where('status', 1)->get();
        if ($minicurso) {
            return ['status' => 'success', 'data' => $minicurso];
        }
        return ['status' => 'error'];
    }

    public function getItem(Request $request)
    {
        $minicurso = Palestra::where(['status' => 1, 'id' => $request->id])->first();
        if ($minicurso) {
            return ['status' => 'success', 'data' => $minicurso];
        }
        return ['status' => 'error'];
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if (Palestra::create($data)) {
            return ['status' => 'success'];
        }
        return ['status' => 'error'];
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $minicurso = Palestra::where('id', $request->id)->first();
        if ($minicurso->update($data)) {
            return ['status' => 'success'];
        }
        return ['status' => 'error'];
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        $minicurso = Palestra::where('id', $request->id)->first();
        $minicurso->status = -1;
        if ($minicurso->update($data)) {
            return ['status' => 'success'];
        }
        return ['status' => 'error'];
    }




    // upload de imagem
    public function uploadBanner(Request $request)
    {
        $data =  $request->all();
        if (isset($data['photo'])) {
            $size = 400;
            $data['photo'] = $this->resizeImage($this->base64_to_jpeg($data['photo'], 'N'), null, $size);
            if ($data['photo']) {
                return ['status'=> 'success', 'photo' =>$data['photo']];
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
