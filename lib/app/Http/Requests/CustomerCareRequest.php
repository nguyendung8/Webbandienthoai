<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCareRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'phone_number' => 'required | numeric',
            'question' => 'required | max:255',
        ];
    }

    public function messages()
    {
        return [
            'phone_number.required' => 'Phone number is required',
            'phone_number.numeric' => 'Phone number must be numeric',
            'question.required' => 'Question is required',
            'question.max' => 'Question may not be greater than 255 characters',
        ];
    }
}
