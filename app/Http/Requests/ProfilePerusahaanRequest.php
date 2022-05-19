<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfilePerusahaanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->role == 'Perusahaan';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_legal' => 'required|min:4|unique:tb_detail_perusahaan',
            'jenis_perusahaan' => 'required',
            'tanggal_berdirinya' => 'required',
            'alamat_kantor' => 'required|min:5',
            'alamat_website' => 'required|url',
            'no_telp' => 'required|numeric|min:11|max:15',
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:6144',
        ];
    }
}
