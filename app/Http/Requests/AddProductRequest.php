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
            "category" => 'required',
                 "subcategory" => 'required',
                 "productname" => 'required|max:100',
                    "quantity" => 'required',
                     "comment" => 'required',
               "product_price" => 'required|integer',
                //     "img_path" => 'required',
                //   "img_path.*" => 'mimes:jpg,png,jpeg,gif,svg',
                  "characters.*.value" => 'required|nullable',
        ];

    }
    public function messages()
    {
        return [

            "characters.*.value.required" => 'The field is required',

        ];

    }
}
