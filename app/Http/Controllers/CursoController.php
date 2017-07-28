<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CursoController extends Controller
{
    public function index()
    {
      $cursos = Curso::_getAll()->get();
      $view = view('adm_escuela.curso.index-curso', compact('cursos'));
      return Response($view);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
      Curso::_createCurso($request);
      return Response('hola');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $curso = Curso::find($id);
      return Response($curso);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
