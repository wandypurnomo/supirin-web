<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Wandxx\Support\Interfaces\DefaultRequestInterface;

class UserFeedbackRequest extends FormRequest implements DefaultRequestInterface
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => "required|max:160",
            "email" => "required|email|max:160",
            "subject" => "required|max:160",
            "message" => "required"
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "Nama diperlukan",
            "name.max" => "Nama terlalu panjang",
            "email.required" => "Email diperlukan",
            "email.max" => "Email terlalu panjang",
            "subject.required" => "Subyek diperlukan",
            "subject.max" => "Subyek terlalu panjang",
            "message.required" => "Pesan diperlukan"
        ];
    }

    public function data(): array
    {
        return $this->only(["name", "email", "subject", "message"]);
    }
}
