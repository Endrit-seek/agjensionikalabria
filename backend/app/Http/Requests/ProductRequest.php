<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'type' => ['required', 'string'],
            'price' => ['required', 'string'],
            'status' => ['required', 'string'],
            'city_id' => ['required', 'integer'],
            'address' => ['nullable', 'string'],
            'street' => ['required', 'string'],
            'space' => ['required', 'integer'],
            'room' => ['required', 'integer'],
            'bath' => ['required', 'integer'],
            'furnished' => ['required', 'boolean'],
        ];
    }
}
