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
        $cronograms = Cronogram::where(['status' =>1])->orderBy('dia_mes', 'ASC')->orderBy('horario_inicio', 'ASC')->orderBy('local', 'ASC')->get();



        $newCronogram = [];
        foreach ($cronograms as $key => $value) {
            $data = $value->dia_mes;
            $data = explode('-', $data);
            $data = $data[2].'/'.$data[1].'/'.$data[0];
            $value->dia_mes = $data;
            if (!isset($newCronogram[$value->dia_mes])) {
                $newCronogram[$value->dia_mes][0] = $value;
            } else {
                $newCronogram[$value->dia_mes][sizeof($newCronogram[$value->dia_mes])] = $value;
            }
        }
        $cronograms = $newCronogram;
        return view('home', compact('palestras', 'miniCursos', 'gallery', 'cronograms'));
    }

    public function comingSon()
    {
        $cronograms = Cronogram::where(['status' =>1])->orderBy('dia_mes', 'ASC')->orderBy('horario_inicio', 'ASC')->orderBy('local', 'ASC')->get();

        $newCronogram = [];
        foreach ($cronograms as $key => $value) {
            $data = $value->dia_mes;
            $data = explode('-', $data);
            $data = $data[2].'/'.$data[1].'/'.$data[0];
            $value->dia_mes = $data;
            if (!isset($newCronogram[$value->dia_mes])) {
                $newCronogram[$value->dia_mes][0] = $value;
            } else {
                $newCronogram[$value->dia_mes][sizeof($newCronogram[$value->dia_mes])] = $value;
            }
        }
        $cronograms = $newCronogram;
        return view('coming-soon', compact('cronograms'));
    }
}
