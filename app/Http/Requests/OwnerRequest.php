<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
            'name'      => ['required', 'string'],
            'email'     => ['required', 'string'],
            'phone'     => ['required', 'numeric'],
            'ktp'       => ['required', 'numeric'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name'     => 'Nama pemilik',
            'email'    => 'Email',
            'phone'    => 'No. Telepon',
            'ktp'      => 'NIK',
        ];
    }
}
