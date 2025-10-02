<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'is_done' => 'sometimes|boolean',
            'keyword_ids' => 'sometimes|array',
            'keyword_ids.*' => 'integer|exists:keywords,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The task title is required',
            'title.max' => 'The title cannot exceed 255 characters',
            'keyword_ids.*.exists' => 'One or more keywords do not exist in the database'
        ];
    }
}
