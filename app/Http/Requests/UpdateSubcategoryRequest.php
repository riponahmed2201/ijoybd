<?php

namespace App\Http\Requests;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSubcategoryRequest extends FormRequest
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
            "category_id"=> "required",
            'name' => 'required|string|max:255|unique:subcategories,name,' . $this->route('subcategory')->id,
            'description' => 'nullable|string|max:1000',
            'status' => 'required|string|min:6|max:8|in:' . implode(',', array_map(fn($case) => $case->value, StatusEnum::cases())),
            'avatar' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', // Optional avatar for updates
        ];
    }

    /**
     * Custom messages for validation errors (optional).
     */
    public function messages(): array
    {
        return [
            'category_id.required'=> 'The category name is required.',
            'name.unique' => 'The subcategory name must be unique.',
            'avatar.mimes' => 'The avatar must be a file of type: jpg, jpeg, png.',
            'avatar.max' => 'The avatar may not be greater than 2MB.',
        ];
    }
}
