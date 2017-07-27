<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turno extends Model
{
  use SoftDeletes;

  public $maniana = '1';
  public $tarde = '2';
  public $noche = '3';

  protected $table = 'turno';

  protected $dates = ['deleted_at'];

  protected $fillable = ['turno', 'colegio_id', 'persona_id'];

  public $timestamps = true;

  public function scope_findTurno($query, $turno, $colegio_id)
  {
    $turno = $query->whereTurno($turno)->whereColegioId($colegio_id);
    return $turno;
  }

  public function scope_crearTurno($query, $data, $id_director, $id_colegio)
  {
    $this->create([
      'turno'       => $data['turno'],
      'colegio_id'  => $id_colegio,
      'persona_id'  => $id_director
    ]);
  }

  public function scope_getColegio($query, $director_id)
  {
    $colegio_id = $query->wherePersonaId($director_id)->get()->first()->colegio_id;
    return $colegio_id;
  }

}