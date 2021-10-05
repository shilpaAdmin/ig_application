<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BureauRequest extends FormRequest
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
            'title'=>'required|unique:bureaus,title,'.$this->id,
            'address_1'=>'required',
            'address_2'=>'required',
            'near_by'=>'required',
            'area'=>'required',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'zipcode'=>'required|numeric',
            'primary_email'=>'required|email|unique:bureaus,primary_email,'.$this->id,
            'alternate_email'=>'email|unique:bureaus,alternate_email,'.$this->id,
            'Primary_Contact_No'=>'required|digits:10|unique:bureaus,Primary_Contact_No,'.$this->id,
            'Alternate_Contact_No'=>'digits:10|unique:bureaus,Alternate_Contact_No,'.$this->id,
            'Official_Website'=>'required|unique:bureaus,Official_Website,'.$this->id,
        ];
    }
}
