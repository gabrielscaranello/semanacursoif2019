<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MiniCursoHasUser extends Model
{
  protected $fillable = [
    'id_user',
    'id_curso',
    'status'
  ];
}
