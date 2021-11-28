<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataAdminStore extends FormRequest
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
            'nama' => 'required|min:3',
            'email' => 'required',
            'password' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nama.required' => 'Harap Isikan Nama',
            'nama.min' => 'nama minimal 3 huruf',
            'email.required' => 'Harap Masukkan Email',
            'password.required' => 'Harap Masukkan Password',
        ];
    }
}
