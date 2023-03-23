<?php

namespace App\Http\Requests\Buku;

use Illuminate\Foundation\Http\FormRequest;

class BukuCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'kode_buku' => ['required'],
            'judul' => ['required'],
            'penerbit' => ['required'],
            'tahun_terbit' => ['required'],
            'stok_buku' => ['required']
        ];
    }
}
