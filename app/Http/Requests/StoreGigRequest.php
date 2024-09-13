<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGigRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'gigdesc' => 'required|string',
            'category' => 'required|integer',
            'subcategories' => 'required|array',
            'subcategories.*' => 'integer',
            'searchTags' => 'nullable|string',
            'declaration' => 'required|string',
            'gig-description-summary' => 'nullable|string',
            'additional_details' => 'nullable|string',
            'video' => 'nullable|file|mimes:mp4',
            'images.*' => 'nullable|file|mimes:jpeg,png,webp',
            'documents.*' => 'nullable|file|mimes:pdf',
        ];
    }
}
