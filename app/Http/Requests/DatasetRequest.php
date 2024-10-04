<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatasetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'nama' => 'required|string',
			'jk' => 'required|string',
			'tgl_lahir' => 'required',
			'jurusan' => 'required|string',
			'kelas' => 'required|string',
			'mtk' => 'required',
			'pjok' => 'required',
			'visual' => 'required',
			'auditori' => 'required',
			'kinestetik' => 'required',
			'skor' => 'required',
			'label' => 'string',
        ];
    }
}
