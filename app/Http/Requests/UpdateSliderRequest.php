<?php

namespace App\Http\Requests;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
            'title' => 'required|string|max:255|unique:sliders,title,' . $this->route('slider')->id,
            'description' => 'nullable|string|max:1000',
            'status' => 'required|string|min:6|max:8|in:' . implode(',', array_map(fn($case) => $case->value, StatusEnum::cases())),
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048'
        ];
    }

    /**
     * Custom messages for validation errors (optional).
     */
    public function messages(): array
    {
        return [
            'name.unique' => 'The brand name must be unique.',
            'image.mimes' => 'The image must be a file of type: jpg, jpeg, png.',
            'image.max' => 'The image may not be greater than 2MB.'
        ];
    }
}
