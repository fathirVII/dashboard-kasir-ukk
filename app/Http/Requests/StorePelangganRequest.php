<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePelangganRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Semua user bisa melakukan request ini (ubah sesuai kebutuhan)
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:100'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_telepon' => ['required', 'string', 'unique:pelanggan,no_telepon'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Harus mengisi nama pelanggan.',
            'alamat.required' => 'Isi domisili terkini.',
            'no_telepon.required' => 'Isi no telepon tidak boleh kosong.',
        ];
    }
}
