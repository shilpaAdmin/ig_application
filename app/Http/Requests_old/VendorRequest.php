<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
            'company_name' => 'required',
            'company_address' => 'required',
            'area' => 'required',
            'zip_code' => 'required',
            'cheque_name' => 'required',
            'company_pan' => 'required',
            'company_tan' => 'required',
            'company_gst' => 'required',
            'company_email' => 'required',
            'company_contact' => 'required',
        ];
    }
}
