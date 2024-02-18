<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:blog_categories,id',
            'banner' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'meta_title' => 'string|max:255',
            'meta_description' => 'string',
            'meta_image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'meta_keywords' => 'string',
        ];
    }
}
