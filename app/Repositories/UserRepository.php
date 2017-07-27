<?php

namespace App\Repositories;

use App\Models\User;
use InfyOm\Generator\Common\BaseRepository;

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'persona_id',
        'roll_id',
        'visible',
        'remember_token',
        'director'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

}
