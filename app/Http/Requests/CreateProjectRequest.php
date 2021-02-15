<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //$this->user()->id == 55;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules($id)
    {
        return [
            'name' => 'required|unique:users,name,' .$id,
            //el email debe ser único excepto el de el usuario que se está editando
            'email' => 'required|email|unique:users,email,'.$id,
            'telefono1' => 'required|digits:9|',
            'telefono2' => 'digits:9|',
            'parada_casa' => 'required',
            'activo' => 'required',
            'hijo1' => 'required|unique:users,hijo1|unique:users,hijo2,' .$id,
            'hijo2' => 'unique:users,hijo2,' .$id,
            'hijo3' => 'unique:users,hijo3,' .$id,
            'hijo4' => 'unique:users,hijo4,' .$id,
          
            'curso_h1' => 'required'
        ];
    }
}
