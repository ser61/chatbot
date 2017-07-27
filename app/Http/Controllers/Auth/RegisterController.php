<?php

namespace App\Http\Controllers\Auth;

use App\Colegio;
use App\Director;
use App\Turno;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
  
  use RegistersUsers;
  
  protected $redirectTo = '/home';
  
  public function __construct()
  {
    $this->middleware('guest');
  }
  
  protected function validator(array $data)
  {
    $users = User::all();
    if(count($users) == 0){
      return Validator::make($data, [
        'name'              => 'required|string|max:255',
        'email'             => 'required|string|email|max:255|unique:users',
        'password'          => 'required|string|min:6|confirmed'
      ]);
    }
    return Validator::make($data, [
      'name'              => 'required|string|max:255',
      'email'             => 'required|string|email|max:255|unique:users',
      'password'          => 'required|string|min:6|confirmed',
      'nombres'           => 'required|string|max:50',
      'apellidos'         => 'required|string|max:50',
      'celular'           => 'required|string|max:10',
      'fecha_nacimiento'  => 'required',
      'nombre'            => 'required|string|max:50',
      'codigo_seduca'     => 'required',
      'turno'             => 'norepetido:'.$data['codigo_seduca'],
      'telefonoc'         => 'required|string|max:10',
      'ciudad'            => 'required',
      'ubicacion'         => 'required',
      'acepto'            => 'required'
    ]);
  }
  
  protected function registered(Request $request, $user)
  {
    //algo...
  }
  
  protected function create(array $data)
  {
    $users = User::all();
    if(count($users) == 0){
      return User::_crearSuperUser($data);
    }
    $id_director = Director::_crearDirector($data);
    $id_colegio = Colegio::_crearColegio($data);
    Turno::_crearTurno($data, $id_director, $id_colegio);
    return User::_crearUser($data, $id_director);
  }
}
