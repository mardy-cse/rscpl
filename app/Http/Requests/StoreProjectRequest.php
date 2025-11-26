<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() && $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'location' => ['required', 'string', 'in:Commercial,Industrial,Residential'],
            'year' => ['required', 'integer', 'min:1900', 'max:' . (date('Y') + 10)],
            'status' => ['required', 'in:Planning,In Progress,Completed,On Hold'],
            'is_featured' => ['boolean'],
            'order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_featured' => $this->has('is_featured') ? 1 : 0,
        ]);
    }

    /**
     * Get custom error messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Project title is required.',
            'description.required' => 'Project description is required.',
            'location.required' => 'Project category is required.',
            'location.in' => 'Invalid category selected.',
            'year.required' => 'Project year is required.',
            'status.required' => 'Project status is required.',
            'status.in' => 'Invalid project status selected.',
            'year.min' => 'Year must be 1900 or later.',
            'year.max' => 'Year cannot be in the future.',
        ];
    }
}
