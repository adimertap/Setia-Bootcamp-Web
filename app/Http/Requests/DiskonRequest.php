<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiskonRequest extends FormRequest
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
            'nama_diskon' => 'required|string',
            'kode_diskon' => 'required|string|max:5|unique:tb_master_diskon',
            'description' =>  'nullable|string',
            'jumlah_diskon' => 'required|min:1|max:100|numeric'
        ];
    }
}
