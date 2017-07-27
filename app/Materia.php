<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Turno;

class Materia extends Model
{
  use SoftDeletes;

  protected $table = 'materia';

  protected $fillable = [
    'nombre', 'colegio_id'
  ];

  public $dates = ['deleted_at'];

  public function scope_getAll($query)
  {
    $colegio_id = Turno::_getColegio(Auth::user()->persona_id);
    $materias = $query->whereColegioId($colegio_id);
    return $materias;
  }

  public function scope_crearMateria($query, $request)
  {
    $colegio_id = Turno::_getColegio(Auth::user()->persona_id);
    $request['colegio_id'] = $colegio_id;
    $this->create($request->all());
  }
}
