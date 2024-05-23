<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'username' => 'required|string',
            'birth' => 'nullable',
            'address' => 'nullable',
            'phone' => ['string', 'regex:/^\+?[0-9]{10,15}$/', 'nullable'],
            'profession' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Gambar harus memiliki format: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Ukuran gambar maksimal adalah 2MB.',
        ];
    }
}
