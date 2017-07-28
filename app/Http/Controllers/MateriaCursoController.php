<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Docente;
use App\Materia;
use App\MateriaCurso;
use Illuminate\Http\Request;

class MateriaCursoController extends Controller
{
    public function index()
    {
        $materias = Materia::_getMateriasLis()->pluck('nombre', 'id');
        return view('adm_escuela.curso.selects', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MateriaCurso::create($request->all());
        return response()->json(['bien' => 'okay']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignaciones = MateriaCurso::_getAll($id)->get();
        $materias = Materia::_getMateriasLis()->pluck('nombre', 'id');
        $docentes = Docente::_getDocentesLis()->pluck('nombre', 'id');
        $cursos = Curso::_getAll()->get();
        $view = view('adm_escuela.curso.index-curso', compact('cursos','materias','docentes','asignaciones'));
        return Response($view);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
