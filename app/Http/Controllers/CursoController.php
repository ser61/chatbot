<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
      $cursos = Curso::_getAll();
      $view = view('adm_escuela.curso.index-curso', compact('cursos'));
      return Response($view);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
      return 'hoal';
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
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
