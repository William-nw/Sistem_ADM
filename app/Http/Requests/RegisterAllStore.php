<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAllStore extends FormRequest
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
            'nis_siswa' => 'required',
            'nama_siswa' => 'required',
            'tingkat' => 'required',
            'kelas' => 'required',
            'tahun_ajaran' => 'required',
            'uang_pembangunan' => 'required',
            'uang_spp' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nis_siswa.required' => 'NIS Siswa Wajib Di Isi',
            'nama_siswa.required' => 'Nama Siswa Wajib Di Isi',
            'tingkat.required' => 'Tingkat Wajib Di Isi',
            'kelas.required' => 'Kelas Wajib Di Isi',
            'tahun_ajaran.required' => 'Tahun Ajaran Wajib Di Isi',
            'uang_pembangunan.required' => 'Uang Pembangunan Wajib Di Isi',
            'uang_spp.required' => 'Uang SPP Wajib Di Isi',
        ];
    }
}
