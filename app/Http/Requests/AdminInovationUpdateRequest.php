<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminInovationUpdateRequest extends FormRequest
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
        $inovationId = $this->route('inovation');
        return [
            'language' => ['required'],
            'province' => ['required'],
            'district' => ['required'],
            'student_name' => ['required'],
            'student_father_name' => ['required'],
            'student_grand_father_name' => ['required'],
            'center_type' => ['required'],
            'address' => ['required'],
            'date_gregorian' => ['required'],
            'date_ghamari' => ['required'],
            'date_shamsi' => ['required'],
            'image' => ['nullable', 'max:3000', 'image'],
            'name' => ['required', 'max:255', 'unique:inovations,name,'.$inovationId],
            'content' => ['required'],
            'meta_title' => ['max:255'],
            'meta_description' => ['max:255'],
            'status' => ['boolean'],
        ];
    }
}
