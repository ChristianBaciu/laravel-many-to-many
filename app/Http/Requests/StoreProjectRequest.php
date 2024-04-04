<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'required' serve a garantire che un campo sia obbligatorio e non possa essere lasciato vuoto
            'titolo' => ['required', 'unique:projects', 'max:100'],
            'contenuto' => ['required', 'max:200'],
            'cover_image' => ['nullable', 'image', 'max:20000'],
            'type_id' => ['nullable', 'exists:types,id'],
            'technologies' => ['exists:technologies,id']
            // unique: serve per rendere il 'titolo' unico
            // nullable: campo non obbligatorio da complilare
            // image: deve essere di tipo img
            // max: massimo * dimensione
            // exists: controlla se è presente un record
        ];
    }
}
