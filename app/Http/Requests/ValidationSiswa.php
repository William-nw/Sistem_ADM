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
            'NIS_siswa' => 'required|min:5|max:20',
            'nama_siswa' => 'required|min:3',
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
            'nama_siswa.min' => 'Nama Siswa Minimal 3',
            'kelas.required' => 'Harap Isikan Kelas',
            'tahun_ajaran.required' => 'Harap Isikan Tahun Ajaran',
        ];
    }
}
