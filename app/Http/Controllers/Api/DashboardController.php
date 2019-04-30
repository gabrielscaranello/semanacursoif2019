<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\MiniCurso;
use App\Models\MiniCursoHasUser;
use App\Models\Palestra;
use App\Models\User;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $minicursos = MiniCurso::where(['status' => 1])->count();
        $inscritos = User::where(['status' => 1])->count();
        $visitantes = User::where(['status' => 1, 'estudante' => 0])->count();
        $palestras = Palestra::where(['status' => 1])->count();
        $data = [
          'minicursos' => $minicursos,
          'inscritos' => $inscritos,
          'visitantes' => $visitantes,
          'palestras' => $palestras,
        ];
        return $data;
    }
}
