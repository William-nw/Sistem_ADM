<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AkunBankStore extends FormRequest
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
            'nama_pemilik_rekening' => 'required',
            'bank_account' => 'required',
            'tipe_bank' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_pemilik_rekening.required' => 'Nama Pemilik Rekening Wajib Di Isi',
            'bank_account.required' => 'Akun Bank Wajib Di Isi',
            'tipe_bank.required' => 'Tipe Bank Wajib Di Isi',
        ];
    }
}
