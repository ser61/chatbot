<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocenteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'nombres'           => 'required|string|max:50',
          'apellidos'         => 'required|string|max:50',
          'celular'           => 'required|string|max:10',
          'fecha_nacimiento'  => 'required'
        ];
    }
}
