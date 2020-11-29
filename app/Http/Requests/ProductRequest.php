<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'brand_id' => 'required',
            'category_id' => 'required',
            'name' => 'required|min:5|max:191|unique:products,name',
            'desc' => 'required|min:10|max:500',
            'image1' => 'required|image',
            'image2' => 'required|image',
            'price' => 'required|numeric',
            'discout' => 'numeric|max:100',
            'accessories' => 'required|max:191|min:5',
            'quantity' => 'required|numeric'
        ];
    }
}
