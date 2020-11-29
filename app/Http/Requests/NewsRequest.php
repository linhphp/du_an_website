<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            //
            'kind_of_news_id' => 'required',
            'news_category_id' => 'required',
            'title' => 'required|max:191|min:10|unique:news,title',
            'description' => 'required|min:20|max:300',
            'content' => 'required|min:20',
            'post_image' => 'required|image'
        ];
    }
}
