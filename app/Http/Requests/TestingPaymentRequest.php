<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestingPaymentRequest extends FormRequest
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
            'account_va' => 'required',
            'amount_transfer' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'account_va.required' => 'Siswa Wajib Di Pilih',
            'amount_transfer.required' => 'Jumlah Transfer Harap Di Isi',
        ];
    }
}
