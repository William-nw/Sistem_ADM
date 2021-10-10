<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationSiswa extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nis' => 'required|max:20',
            'nama_siswa' => 'required',
            'kelas' => 'required',
            'tahun_ajaran' => 'required',
            'nominal_spp' => 'required',
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
            'nis.required' => 'Harap Isikan NIS',
            'nis.max' => 'Maximal NIS 20 Karakter',
            'nama_siswa.required' => 'Harap Isikan Nama Siswa',
            'kelas.required' => 'Harap Isikan Kelas',
            'tahun_ajaran.required' => 'Harap Isikan Tahun Ajaran',
        ];
    }
}
