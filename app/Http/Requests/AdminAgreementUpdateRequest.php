<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAgreementUpdateRequest extends FormRequest
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
            'language' => ['required'],
            'image' => ['nullable', 'max:3000', 'image'],
            'file' => ['nullable', 'max:10000', 'file'],
            'subject' => ['required', 'max:255'],
            'content' => ['required'],
            'meta_title' => ['max:255'],
            'meta_description' => ['max:255'],
            'status' => ['boolean'],
            'date_gregorian' => ['required'],
            'date_ghamari' => ['required'],
            'date_shamsi' => ['required'],
        ];
    }
}
