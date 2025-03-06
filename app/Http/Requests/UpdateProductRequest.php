<?php

namespace App\Http\Requests;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'stock_quantity' => 'required|numeric',
            'category' => 'required|numeric',
            'brand' => 'required|numeric',
            'size' => 'required',
            'color' => 'required',
            'thumbnail' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'images' => 'nullable',
            'status' => 'required|string|min:6|max:8|in:' . implode(',', array_map(fn($case) => $case->value, StatusEnum::cases())),
        ];
    }
}
