<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendaftaranProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // defatul false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'handphone_number' => 'required|numeric',
            'universitas' => 'required',
            'alamat_lengkap' => 'required'
        ];
    }

    /**
     * todo Showing messages
     */
    public function messages()
    {
        return [
            'handphone_number.required' => 'Nomor handphone wajib diisi!',
            'handphone_number.numeric' => 'Nomor handphone wajib berupa angka!',
            'universitas.required' => 'Universitas wajib diisi!',
            'alamat_lengkap.required' => 'Alamat lengkap wajib diisi!'
        ];
    }
}
