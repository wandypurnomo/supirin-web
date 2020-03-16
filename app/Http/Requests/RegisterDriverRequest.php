<?php

namespace App\Http\Requests;

use App\Constants\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Wandxx\Support\Interfaces\DefaultRequestInterface;

class RegisterDriverRequest extends FormRequest implements DefaultRequestInterface
{

    public function authorize(): bool
    {
        return !auth()->check();
    }

    public function rules(): array
    {
        return [
            'nik' => 'required',
            'bank' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
            'name' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'experience' => 'required',
            'file_foto' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'nik.required' => 'Nik diperlukan.',
            'bank.required' => 'Bank diperlukan.',
            'account_name.required' => 'Nama akun bank diperlukan.',
            'account_number.required' => 'No. Rekening diperlukan.',
            'name.required' => 'Nama diperlukan.',
            'dob.required' => 'Tanggal lahir diperlukan.',
            'phone.required' => 'No. Handphone diperlukan.',
            'email.required' => 'Email diperlukan.',
            'email.email' => 'Format penulisan email tidak tepat.',
            'password.required' => 'Password diperlukan.',
            'password.confirmed' => 'Password tidak cocok',
            'experience.required' => 'Pengalaman diperlukan.',
            'file_foto.required' => 'Foto diperlukan',
            'file_foto.image' => 'File harus gambar.'
        ];
    }

    public function data(): array
    {
        $this->merge(['metadata' => $this->_buildMetadata()]);
        $this->merge(['role' => UserRole::DRIVER]);
        $only = ['phone', 'email', 'password', 'metadata', 'role','file_foto'];
        return $this->only($only);
    }

    private function _buildMetadata()
    {
        return [
            'name' => $this->input('name'),
            'nik' => $this->input('nik'),
            'dob' => $this->input('dob'),
            'experience' => $this->input('experience'),
            'bank' => [
                'bank' => $this->input('bank'),
                'name' => $this->input('account_name'),
                'number' => $this->input('account_number')
            ]
        ];
    }
}
