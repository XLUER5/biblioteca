<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre_completo' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    $autorId = $this->route('autor') ? $this->route('autor')->id : null;
                    if (\App\Models\Autor::where('nombre_completo', $value)
                        ->where('activo', 1)
                        ->where('id', '!=', $autorId)
                        ->exists()) {
                        $fail('El nombre completo del autor ya existe.');
                    }
                },
            ],
            'nacionalidad' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date'
        ];
    }
}