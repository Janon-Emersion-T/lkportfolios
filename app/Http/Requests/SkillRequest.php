<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Change this if you need role-based access control
    }

    public function rules(): array
    {
        return [
            'skill' => 'required|string|max:255',
            'skill_type' => 'required|in:Technical,Soft,Language,Other',
            'skill_level' => 'required|in:Beginner,Intermediate,Advanced,Expert',
            'use_on_CV' => 'boolean',
            'is_verified' => 'boolean',
            'verified_date' => 'nullable|date',
            'verifier_id' => 'nullable|exists:users,id',
        ];
    }
}
