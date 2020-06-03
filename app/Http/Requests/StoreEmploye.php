<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmploye extends FormRequest
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
            'image' => 'required|image|max:2000'
        ];
    }

    /**
     * Get the messages for the defined validation rules.
     * @return array
     */
    public function messages()
    {
        return [
            'image.required' => 'Image est obligatoire',
            'image.image'   => 'Image doit être au format jpg, png, gif...',
            'image.max' => 'Image ne doit pas dépasser 2mo'
        ];
    }
}
