<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class MateriaCurso extends Model
{
  use SoftDeletes;
  
  protected $table = 'materia_curso';
  
  protected $fillable = [
    'meteria_id', 'curso_id', 'persona_id'
  ];
  
  public $dates = ['deleted_at'];

  public function scope_getAll($query, $curso_id)
  {
      $colegio_id = Turno::_getColegio(Auth::user()->persona_id);
      $asignaciones = $query->select('m.nombre as materia')
            ->join('materia as m', 'm.id','=','materia_curso.meteria_id')
            ->whereCursoId($curso_id)
            ->where('m.colegio_id',$colegio_id);
      return $asignaciones;
  }
}
