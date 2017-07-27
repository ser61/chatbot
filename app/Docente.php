<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Docente extends Model
{
  use SoftDeletes;

  protected $table = 'persona';

  public $docente = '3';

  public $dates = ['deleted_at'];

  protected $fillable =[
    'nombres', 'apellidos', 'celular', 'fecha_nacimiento', 'colegio_id','tipo_persona'
  ];

  public $timestamps = true;

  public function scope_crearDocente($query, $request)
  {
    $colegio_id = Turno::_getColegio(Auth::user()->persona_id);
    $request['colegio_id'] = $colegio_id;
    $request['tipo_persona'] = $this->docente;
    $this->create($request->all());
    $lastId = $this->all()->last()->id;
    return $lastId;
  }

  public function setFechaNacimientoAttribute($value)
  {
    $this->attributes['fecha_nacimiento'] = Carbon::parse($value);
  }

  public function scope_getAll($query)
  {
    $colegio_id = Turno::_getColegio(Auth::user()->persona_id);
    $docentes = $query->whereColegioId($colegio_id);
    return $docentes;
  }

}
