<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Turno;
use Illuminate\Support\Facades\Auth;

class Curso extends Model
{
  use SoftDeletes;

  protected $table = 'curso';

  protected $fillable = [
    'nivel', 'capacidad','paralelo', 'colegio_id', 'turno_id'
  ];

  public $dates = ['deleted_at'];

  public function scope_getAll($query)
  {
    $colegio_id = Turno::_getColegio(Auth::user()->persona_id);
    $cursos = $query->whereColegioId($colegio_id);
    return $cursos;
  }
}
