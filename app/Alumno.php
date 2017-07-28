<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Alumno extends Model
{
    use SoftDeletes;

    protected $table = 'persona';

    public $alumno = '1';

    public $dates = ['deleted_at'];

    protected $fillable =[
        'nombres', 'apellidos', 'celular', 'fecha_nacimiento', 'colegio_id','tipo_persona','ci','fbid'
    ];

    public $timestamps = true;

    public function scope_getAll($query)
    {
        $colegio_id = Turno::_getColegio(Auth::user()->persona_id);
        $alumnos = $query->whereColegioId($colegio_id);
        return $alumnos;
    }

    public function scope_crearAlumno($query, $request)
    {
        $colegio_id = Turno::_getColegio(Auth::user()->persona_id);
        $request['colegio_id'] = $colegio_id;
        $request['tipo_persona'] = $this->alumno;
        $this->create($request->all());
        $lastId = $this->all()->last()->id;
        return $lastId;
    }
}
