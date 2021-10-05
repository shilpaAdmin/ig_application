<?php

namespace App\http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'contact_person' => 'required',
            'company_contact' => 'required',
            'customer_email' => 'required', 
            'pan' => 'required',
            'tan' => 'required',
            'gst_no' => 'required',
            'website' => 'required',
        ];
    }
}
