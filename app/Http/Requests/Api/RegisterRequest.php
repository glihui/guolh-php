<?php

namespace App\Http\Requests\Api;

class RegisterRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
