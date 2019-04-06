<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MiniCurso extends Model
{
    protected $fillable = [
      'name',
      'image',
      'category',
      'descript',
      'autors',
      'day',
      'hour',
      'hours',
    ];
}
