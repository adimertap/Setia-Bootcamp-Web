<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $expiredValidation = date('Y-m', time());

        return [
            'name' => 'required|string|unique:users,name,'.Auth::id().',id',
            'email' => 'required|email|unique:users,email,'.Auth::id().',id',
            'occupation' => 'required|string',
            // 'card_number' => 'required|numeric|digits_between:8,16',
            // 'expired' => 'required|date|date_format:Y-m|after_or_equal:'.$expiredValidation,
            // 'cvc' => 'required|numeric|digits:3'

            'phone' => 'required',
            'address' => 'required|string',
            'discount' => 'nullable|string|exists:tb_master_diskon,kode_diskon'
        ];
    }
}
