<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'product_category_id' => 'required|exists:product_categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле :attribute обязательно для заполнения',
            'title.string' => 'Поле :attribute должно быть строкой',
            'description.string' => 'Поле :attribute должно быть строкой',
            'price.required' => 'Поле :attribute обязательно для заполнения',
            'price.numeric' => 'Поле :attribute должно быть числом',
            'quantity.required' => 'Поле :attribute обязательно для заполнения',
            'quantity.integer' => 'Поле :attribute должно быть целым числом',
            'product_category_id.required' => 'Поле :attribute обязательно для заполнения',
            'product_category_id.exists' => 'Поле :attribute должно быть существующим',
        ];
    }
}
