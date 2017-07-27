<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Colegio extends Model
{
  use SoftDeletes;

  private $publico = '1';   private $privado = '2';   private $convenio = '3';
  private $beni = '1';      private $chuquisaca ='2'; private $cochabamba ='3';
  private $santa_cruz ='4'; private $la_paz ='5';     private $oruro ='6';
  private $pando ='7';      private $potosi ='8';     private $tarija ='9';

  protected $table = 'colegio';

  protected $fillable = [
    'nombre',
    'codigo_seduca',
    'tipo_colegio',
    'telefono',
    'departamento',
    'ciudad',
    'ubicacion'
  ];

  protected $dates = ['deleted_at'];

  public $timestamps = true;

  public function scope_crearColegio($query, $data)
  {
    $this->create([
      'nombre' => $data['nombre'],
      'codigo_seduca' => $data['codigo_seduca'],
      'tipo_colegio' => $data['tipo_colegio'],
      'telefono' => $data['telefonoc'],
      'departamento' => $data['departamento'],
      'ciudad' => $data['ciudad'],
      'ubicacion' => $data['ubicacion'],
    ]);
    $lastId = $this->all()->last()->id;
    return $lastId;
  }
  
  public function scope_getIdColegio($query, $codigo_seduca)
  {
    $id = $query->whereCodigoSeduca($codigo_seduca)->get();
    if(count($id) == 0){
      $id = -1;
    }else{
      $id = $id->first()->id;
    }
    return $id;
  }
  
}
