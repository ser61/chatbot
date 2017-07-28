<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaCurso extends Model
{
  use SoftDeletes;
  
  protected $table = 'materia_curso';
  
  protected $fillable = [
    'materia_id', 'curso_id'
  ];
  
  public $dates = ['deleted_at'];
}
