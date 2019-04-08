<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Palestra;
use App\Models\MiniCurso;
use App\Models\Gallery;
use App\Models\Cronogram;

class HomeController extends Controller
{
    public function index()
    {
        $palestras = Palestra::where(['status' => 1])->get();
        $miniCursos = MiniCurso::where(['status' => 1])->get();
        $gallery = Gallery::where(['status' => 1])->get();
        $cronograms = Cronogram::where(['status' =>1])->get();





$cronograma;
$days;
foreach ($cronograms as $key => $value) {
  if (condition) {
    // code...
  }
}







        return view('home', compact('palestras', 'miniCursos', 'gallery', 'cronograms'));
    }
}
