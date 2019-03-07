<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
    public function rules(Request $request){
        $input = $request->id;
        return [
            'title' => 'required|max:200',
            'alias' => 'required|max:20|unique:articles,alias,'.$input,
            'desc' => 'required|max:200',
            'text' => 'required|max:2000',
            'category_id' => 'required|integer',

        ];
    }
}
