<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTodo extends FormRequest
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
            'title' => 'required|max:15',
            'user_id' => 'exists:users,id',
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Privalote užpildyti pavadinimą',
            'title.max' => 'Per ilgas pavadinimas',
            'user_id.exists' => 'Toks useris neegzistuoja',
        ];
    }
}
