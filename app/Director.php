<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Director extends Model // Direcotor tipo_persona 2;
{
  use SoftDeletes;

  public $director = '2';

  protected $table = 'persona';

  protected $fillable =[
    'nombres', 'apellidos', 'celular', 'fecha_nacimiento', 'tipo_persona'
  ];

  protected $dates = ['deleted_at'];

  public $timestamps = true;

  public function scope_crearDirector($query, array $data)
  {
    $this->create([
      'nombres' => $data['nombres'],
      'apellidos' => $data['apellidos'],
      'celular' => $data['celular'],
      'fecha_nacimiento' => $data['fecha_nacimiento'],
      'tipo_persona' => $this->director
    ]);
    $lastId = $this->all()->last()->id;
    return $lastId;
  }

  public function setFechaNacimientoAttribute($value)
  {
    $this->attributes['fecha_nacimiento'] = Carbon::parse($value);
  }
}
