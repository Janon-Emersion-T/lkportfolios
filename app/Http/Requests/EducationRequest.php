<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'school' => 'required|string|max:255',
            'degree' => 'nullable|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'start_month' => 'required|integer|min:1|max:12',
            'start_year' => 'required|integer|min:1900|max:' . date('Y'),
            'end_month' => 'nullable|integer|min:1|max:12',
            'end_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'grade' => 'nullable|string|max:50',
            'is_current' => 'boolean',
            'activities' => 'nullable|string',
            'description' => 'nullable|string',
            'media' => 'nullable|json',
            'is_verified' => 'boolean',
            'verified_date' => 'nullable|date',
            'verifier_id' => 'nullable|exists:users,id',
            'add_to_cv' => 'boolean',
        ];
    }
}
