<?php

namespace App\Http\Controllers;

use App\Http\Requests\MateriaFormRequest;
use App\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
      $materias = Materia::_getAll()->get();
      $view = view('adm_escuela.materia.index-materia', compact('materias'));
      return Response($view);
    }

    public function create()
    {
        //
    }

    public function store(MateriaFormRequest $request)
    {
      Materia::_crearMateria($request);
      return response()->json(['bien' => 'okay']);
    }

    public function show(Materia $materia)
    {
        //
    }

    public function edit(Materia $materia)
    {
        //
    }

    public function update(MateriaFormRequest $request, Materia $materia)
    {
      $materia->update($request->all());
      $materia->save();
      return response()->json(['bien' => 'okay']);
    }

    public function destroy(Materia $materia)
    {
      $materia->delete();
      return response()->json(['bien' => 'okay']);
    }
}
