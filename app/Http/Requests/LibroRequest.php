<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibroRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (\App\Models\Libro::where('titulo', $value)->where('activo', 1)->exists()) {
                        $fail('El título del libro ya existe.');
                    }
                },
            ],
            'descripcion' => 'required|string',
            'fecha_publicacion' => 'required|date',
            'autor_id' => 'required|exists:autors,id'
        ];
    }
}