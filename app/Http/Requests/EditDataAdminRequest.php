<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditDataAdminRequest extends FormRequest
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
            'nama_lengkap' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
            'status_user' => 'required',
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
            'nama_lengkap.required' => 'Harap Isikan Nama Lengkap',
            'email.required' => 'Harap Masukkan Email',
            'password.required' => 'Harap Masukkan Password',
            'password.min' => 'Minimal Password 6 digit',
            'status_user.required' => 'Harap Masukkan Status Admin',
        ];
    }
}
