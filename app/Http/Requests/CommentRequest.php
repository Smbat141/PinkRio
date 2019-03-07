<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class CommentRequest extends FormRequest
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

    /*protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($response));
    }*/

    protected function getValidatorInstance()
    {
        $validator =  parent::getValidatorInstance();

       if($validator->fails()){
            throw new HttpResponseException(response()->json((['error' => $validator->errors()->all()])));
       }

        return $validator;
    }

   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'text' => 'required',
        ];
    }

    public function messages(){
        return [
        ];
    }


    /*
    if ($validator->fails()) {
     return \Response::json(['error' => $validator->errors()->all()]);
    }
    */

}
