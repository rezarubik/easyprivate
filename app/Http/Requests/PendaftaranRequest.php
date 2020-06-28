<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendaftaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // default false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ipk_score' => 'required|numeric|min:0|max:4',
            'teach_experience' => 'required|numeric|min:1',
            // 'file_cv' => 'required|mimes:pdf|size:50000',
            // 'file_microteaching' => 'required|mimetypes:video/mp4|max:20000',
        ];
    }

    /**
     * todo Display messages
     */
    public function messages()
    {
        return [
            'ipk_score.required' => 'Nilai IPK wajib diisi!',
            'ipk_score.numeric' => 'Nilai IPK wajib berupa angka!',
            'ipk_score.min' => 'Nilai IPK minimal 0!',
            'ipk_score.max' => 'Nilai IPK maksimal 4!',
            'teach_experience.required' => 'Pengalaman mengajar wajib diisi!',
            'teach_experience.numeric' => 'Nilai IPK wajib berupa angka!',
            'teach_experience.min' => 'Pengalaman mengajar minimal 1 bulan',
        ];
    }
}
