<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MiniCurso;
use Storage;
use Image;

class MiniCursoController extends Controller
{
  public function list()
  {
      $minicurso = MiniCurso::where('status', 1)->get();
      if ($minicurso) {
          return ['status' => 'success', 'data' => $minicurso];
      }
      return ['status' => 'error'];
  }

  public function getItem(Request $request)
  {
      $minicurso = MiniCurso::where(['status' => 1, 'id' => $request->id])->first();
      if ($minicurso) {
          return ['status' => 'success', 'data' => $minicurso];
      }
      return ['status' => 'error'];
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
