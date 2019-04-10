<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cronogram extends Model
{
    protected $fillable = [
'type',
'title',
'instituicao',
'auxiliares',
'local',
'ministrante',
'monitor',
'horario_inicio',
'horario_fim',
'dia_mes',
'dia_semana',
'turma',
'cor',
'status'
];
}
