<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarFormularioRequest extends FormRequest
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
            'nameClass' => 'required|min:1|max:255',
            'descriptionClass' => 'required|min:1|',
            'code' => 'required|unique:groups,code',
        ];
    }
    public function messages(){
      return [
        'nameClass.required'   => 'El :attribute es obligatorio.',
        'nameClass.min'        => 'El :attribute debe contener mas de una letra.',
        'nameClass.max'        => 'El :attribute debe contener max 30 letras.',

        'descriptionClass.required' => 'La :attribute es obligatoria.',
        'descriptionClass.min'      => 'La :attribute debe contener más de una letra.',
        'descriptionClass.max'      => 'La :attribute debe contener maxímo 30 letras.',

        'code.required' => 'El :attribute es obligatorio.',
        'code.unique' => 'El :attribute debe ser único.',
      ];
    }
    public function attributes(){
      return [
        'nameClass'         => 'nombre',
        'descriptionClass'  => 'descripción',
        'code'              => 'código',
      ];
    }
}
