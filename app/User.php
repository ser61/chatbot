<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable, SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $fillable = [
    'name', 'email', 'password', 'persona_id', 'colegio_id'
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];

  public function scope_crearUser($query, array $data, $id)
  {
    return $this->create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => bcrypt($data['password']),
      'persona_id' => $id,
    ]);
  }

  public function scope_crearSuperUser($query, array $data)
  {
    return $this->create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => bcrypt($data['password']),
    ]);
  }
}
