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
            // 'jenjang_1' => 'required|not_in:0',
            // 'mapel_1' => 'required|not_in:0',
            // 'jenjang_2' => 'required|not_in:0',
            // 'mapel_2' => 'required|not_in:0',
            // 'jenjang_3' => 'required|not_in:0',
            // 'mapel_3' => 'required|not_in:0',
            // 'jenjang_4' => 'required|not_in:0',
            // 'mapel_4' => 'required|not_in:0',
            // 'jenjang_5' => 'required|not_in:0',
            // 'mapel_5' => 'required|not_in:0',
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
            // 'jenjang_1.required' => 'Jenjang 1 wajib dipilih',
            // 'mapel_1.required' => 'Mata Pelajaran 1 wajib dipilih',
            // 'jenjang_2.required' => 'Jenjang 2 wajib dipilih',
            // 'mapel_2.required' => 'Mata Pelajaran 2 wajib dipilih',
            // 'jenjang_3.required' => 'Jenjang 3 wajib dipilih',
            // 'mapel_3.required' => 'Mata Pelajaran 3 wajib dipilih',
            // 'jenjang_4.required' => 'Jenjang 4 wajib dipilih',
            // 'mapel_4.required' => 'Mata Pelajaran 4 wajib dipilih',
            // 'jenjang_5.required' => 'Jenjang 5 wajib dipilih',
            // 'mapel_5.required' => 'Mata Pelajaran 5 wajib dipilih',
        ];
    }
}
