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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "category_id" => 'required',
                   "name" => 'required|max:100',
                  "price" => 'required|integer',
            //      "sale_price" => $request->selling_price,
            "description" => 'required|min:20',
        ];
    }
}
