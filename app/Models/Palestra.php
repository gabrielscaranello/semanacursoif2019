<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Palestra extends Model
{
    protected $fillable = [
      'name',
      'photo',
      'descript',
      'palestrante',
      'day',
      'hour',
      'status'
    ];
}
