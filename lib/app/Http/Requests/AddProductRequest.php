<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'img' => 'image',
            'product_name'=>'unique:vp_products,prod_name,' . $this->segment(4) . ',prod_id'
        ];
    }
    public function messages()
    {
        return [
            'img.image' => 'Please upload an image file',
            'product_name.unique' => 'Product name already exists'
        ];
    }
}
