<?php

namespace App\Http\Controllers;

use App\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::_getAll()->get();
        $view = view('adm_escuela.alumno.index-alumno', compact('alumnos'));
        return Response($view);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            Alumno::_crearAlumno($request);
            return response()->json(['bien' => 'genial']);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $alumno = Alumno::find($id);
            return Response($alumno);
        }
    }

    public function update(Request $request, $id)
    {
        $alumno = Alumno::find($request['id']);
        $alumno->update($request->all());
        $alumno->save();
        return response()->json(['bien' => 'genial']);
    }

    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        $alumno->delete();
        return response()->json(['bien' => 'okay']);
    }
}
