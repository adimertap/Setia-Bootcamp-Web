<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelasRequest extends FormRequest
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
            'id_jenis_kelas' => 'required|exists:tb_master_jenis_kelas,id_jenis_kelas',
            'id_level' => 'required|exists:tb_master_level,id_level',
            'nama_kelas' => 'required|min:8|max:150',
            'harga_kelas' => 'required|min:1000|numeric',
            'tentang_kelas' => 'required|min:50',
            'cover_kelas' => 'required|image|mimes:jpeg,png,jpg|max:2048',

           
        ];
    }
    public function messages()
    {
        return [
            'id_jenis_kelas.required' => 'Error! Anda Belum Mengisi Jenis Kelas',
            'id_level.required' => 'Error! Anda Belum Mengisi Level Kelas',

            'nama_kelas.required' => 'Error! Anda Belum Mengisi Nama Kelas',
            'nama_kelas.min' => 'Error! Character Minimal :min digit',
            'nama_kelas.max' => 'Error! Character Maximal :max digit',

            'harga_kelas.required' => 'Error! Anda Belum Mengisi Harga Kelas',
            'harga_kelas.min' => 'Error! Nominal Minimal :min digit',

            'tentang_kelas.required' => 'Error! Anda Belum Mengisi Deskripsi Kelas',
            'tentang_kelas.min' => 'Error! Nominal Minimal :min digit',

            'cover_kelas.required' => 'Error! Anda Belum Memasukan File Foto Cover Kelas',
            'cover_kelas.mimes' => 'Error! File diTerima dalam bentuk JPEG, PNG, JPG',
            'cover_kelas.max' => 'Error! Size File Maximal :max',

        ];
    }
}
