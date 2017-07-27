<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
  protected $table = 'persona';

  protected $fillable =[
    'nombres', 'apellidos', 'telefono', 'celular', 'fecha_nacimiento', 'visible','director'
  ];

  public $timestamps = true;

  public function scope_crearPersona($query, array $data)
  {
    $this->create([
      'nombres' => $data['nombres'],
      'apellidos' => $data['apellidos'],
      'telefono' => $data['telefono'],
      'celular' => $data['celular'],
      'fecha_nacimiento' => $data['fecha_nacimiento'],
      'visible' => '1'
    ]);
    $lastId = $this->all()->last()->id;
    return $lastId;
  }
  
  public function setFechaNacimientoAttribute($value)
  {
    $this->attributes['fecha_nacimiento'] = Carbon::parse($value);
  }
}
