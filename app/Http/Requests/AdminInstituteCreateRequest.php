<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminInstituteCreateRequest extends FormRequest
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
            'province' => ['required'],
            'district' => ['required'],
            'code' => ['required'],
            'center_type' => ['required'],
            'address' => ['required'],
            'date_gregorian' => ['required'],
            'date_ghamari' => ['required'],
            'date_shamsi' => ['required'],
            'image' => ['required', 'max:3000', 'image'],
            'name' => ['required', 'max:255', 'unique:institutes,name'],
            'content' => ['required'],
            'meta_title' => ['max:255'],
            'meta_description' => ['max:255'],
            'status' => ['boolean'],
        ];
    }
}
