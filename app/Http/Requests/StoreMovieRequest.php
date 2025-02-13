<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required' ,
            'release_year' => 'required' ,
            'actors' => 'required' ,
            'category' => 'required' ,
            'image' => 'required' ,
        ];
    }

    public function messages(): array {
        return [
            'title.required' => ' Wajib Diisi ',
            'description.required' => 'Wajib Diisi',
           'release_year.required' => 'Wajib Diisi',
            'actors.required' => 'Wajib Diisi',
            'category.required' => 'Wajib Diisi',
            'image.required' => 'Wajib Diisi'
        ];
    }
}
