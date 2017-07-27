<?php
namespace App\Http;

use App\Colegio;
use App\Turno;

class MiValidator {
  
  public function validar($attribute, $value, $parameters, $validator)
  {
    $colegio_id = Colegio::_getIdColegio($parameters[0]);
    $turno = Turno::_findTurno($value, $colegio_id)->get();
    if(count($turno) == 0){
      return true;
    }
    return false;
  }

}