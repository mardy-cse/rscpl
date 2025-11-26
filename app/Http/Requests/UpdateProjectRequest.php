<?php

namespace App\Http\Requests;

class UpdateProjectRequest extends StoreProjectRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = parent::rules();
        
        // Make image optional for updates
        $rules['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'];
        
        return $rules;
    }
}
