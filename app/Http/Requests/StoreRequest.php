<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'owner_id'  => ['required'],
            'name'      => ['required', 'string'],
            'lat'       => ['required', 'numeric'],
            'lon'       => ['required', 'numeric'],
            'address'   => ['required', 'string'],
            'phone'     => ['required', 'numeric'],
            'active'    => ['required']
        ];
    }

    public function attributes()
    {
        return [
            'owner_id' => 'Pemilik',
            'name'     => 'Nama',
            'lat'      => 'Latitude',
            'lon'      => 'Longitude',
            'address'  => 'Alamat',
            'phone'    => 'No. Telepon',
            'active'   => 'Status'
        ];
    }
}
