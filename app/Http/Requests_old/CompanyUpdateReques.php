<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateReques extends FormRequest
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
            'company_name'=>'required|unique:companys,name,'.$this->id,
            'short_code'=>'required',
            'address_1'=>'required',
            'address_2'=>'required',
            'near_by'=>'required',
            'area'=>'required',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'zipcode'=>'required|numeric',
            'primary_email'=>'required|email|unique:companys,primary_email,'.$this->id,
            'alternate_email'=>'email|unique:companys,alternate_email,'.$this->id,
            'Primary_Contact_No'=>'required|digits:10|unique:companys,Primary_Contact_No,'.$this->id,
            'Alternate_Contact_No'=>'digits:10|unique:companys,Alternate_Contact_No,'.$this->id,
            'Official_Website'=>'required|unique:companys,Official_Website,'.$this->id,
            'Employer_Contribution'=>'required',
            'pf_no'=>'required|unique:companys,company_pf_no,'.$this->id,
            'esi_no'=>'required|unique:companys,company_esi_no,'.$this->id,
        ];
    }
}
