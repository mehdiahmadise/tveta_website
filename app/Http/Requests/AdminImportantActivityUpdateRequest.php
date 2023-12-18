<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminImportantActivityUpdateRequest extends FormRequest
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
        $importantActivityId = $this->route('important_activities');
        return [
            'language' => ['required'],
            'category' => ['required'],
            'date_gregorian' => ['required'],
            'date_ghamari' => ['required'],
            'date_shamsi' => ['required'],
            'image' => ['nullable', 'max:3000', 'image'],
            'title' => ['required', 'max:255', 'unique:important_activites,title,'.$importantActivityId],
            'description' => ['required'],
            'meta_title' => ['max:255'],
            'meta_description' => ['max:255'],
            'status' => ['boolean'],
        ];
    }
}
