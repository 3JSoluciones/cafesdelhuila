<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CrearDepartamentoRequest extends Request
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
            'nombre' => 'required'
        ];
    }

    public function messages(){
        return [
            'required'  => 'El campo nombre es requerido',
            'min'       => 'El mínimo permitido son 3 caracteres',
            'max'       => 'El máximo permitido son 12 caracteres',
            'regex'     => 'Sólo se aceptan letras',
        ];
    }

    public function response(array $errors){
        return redirect($this->redirect)
                ->withErrors($errors)
                ->withInput();
    }

}
