<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class KelasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->role == 'Admin';
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
            'tentang_kelas' => 'required',
            'cover_kelas' => 'required|image|mimes:jpeg,png,jpg|max:8048',
        ];
    }
}
