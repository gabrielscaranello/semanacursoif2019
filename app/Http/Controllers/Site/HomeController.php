<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Palestra;
use App\Models\MiniCurso;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index()
    {
        $palestras = Palestra::where(['status' => 1])->get();
        $miniCursos = MiniCurso::where(['status' => 1])->get();
        $gallery = Gallery::where(['status' => 1])->get();

        return view('home', compact('palestras', 'miniCursos', 'gallery'));
    }
}
