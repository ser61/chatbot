<?php

namespace App\Http\Controllers;

use App\Docente;
use App\Http\Requests\DocenteFormRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocenteController extends Controller
{
    public function index()
    {
      $docentes = Docente::_getAll()->get();
      $view = view('adm_escuela.docente.index', compact('docentes'));
      return Response($view);
    }

    public function create()
    {
        //
    }

    public function store(DocenteFormRequest $request)
    {
      if ($request->ajax()) {
        Docente::_crearDocente($request);
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
        $docente = Docente::find($id);
        return Response($docente);
      }
    }

    public function update(DocenteFormRequest $request, $id)
    {
      $docente = Docente::find($request['id']);
      $docente->update($request->all());
      $docente->save();
      return response()->json(['bien' => 'genial']);
    }

    public function destroy($id)
    {
      $docente = Docente::find($id);
      $docente->delete();
      return response()->json(['bien' => 'okay']);
    }
}
