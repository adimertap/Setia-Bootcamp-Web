<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PengumumanLowonganRequest extends FormRequest
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
            'nama_pengumuman' => 'required|min:8',
            'job_description' => 'required|min:20',
            'job_requirement' => 'required|min:20',
            'job_type' => 'required',
            'job_salary' => 'required|numeric|digits_between:1000000,100000000',
            'job_years_experience' => 'required|min:1|max:2',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'qualification' => 'required',
        ];
    }
}
