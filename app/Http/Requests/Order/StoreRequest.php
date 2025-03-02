<?php

namespace App\Http\Requests\Order;

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
            'client_id' => 'required|exists:clients,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',
            'comment' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'client_id.required' => 'Поле "Клиент" обязательно для заполнения.',
            'client_id.exists' => 'Клиент с таким ID не существует.',
            'product_id.required' => 'Поле "Товар" обязательно для заполнения.',
            'product_id.exists' => 'Товар с таким ID не существует.',
            'quantity.required' => 'Поле "Количество" обязательно для заполнения.',
            'quantity.numeric' => 'Поле "Количество" должно быть числом.',
            'quantity.min' => 'Количество должно быть не менее 1.',
            'comment.string' => 'Комментарий должен быть строкой.',
        ];
    }
}
