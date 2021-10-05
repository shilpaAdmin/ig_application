<?php

namespace App\Http\Requests;
//use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class BusinessRequest extends FormRequest
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
            'name' => 'required|unique:business,name,'.$this->id,
            'about'=>'required',
            'address'=>'required',
            'desciption'=>'required',
            'sub_desciption'=>'required',
            'sub_desciption_1'=>'required',
            'sub_desciption'=>'required',
            'actual_price'=>'required',
            'actual_price_unit'=>'required',
            'selling_price'=>'required',
            'selling_price_unit'=>'required',
          ];
    }
}
