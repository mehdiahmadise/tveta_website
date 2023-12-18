<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminArticleCreateRequest extends FormRequest
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
            'category' => ['required'],
            'province' => ['required'],
            'district' => ['required'],
            'center_type' => ['required'],
            'image' => ['required', 'max:3000', 'image'],
            'file' => ['required', 'max:10000', 'file'],
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'meta_title' => ['max:255'],
            'meta_description' => ['max:255'],
            'status' => ['boolean'],
            'author' => ['required'],
            'date_gregorian' => ['required'],
            'date_ghamari' => ['required'],
            'date_shamsi' => ['required'],
        ];
    }
}
