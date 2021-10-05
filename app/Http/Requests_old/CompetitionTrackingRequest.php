<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompetitionTrackingRequest extends FormRequest
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
            'tracking' => 'required',
            'trackingname' => 'required',
            'companyname' => 'required',
            'brand' => 'required',
            'size' => 'required',
            'duration' => 'required',
            'agency' => 'required',
            'custom_file' => 'required',
            'brandambassador' => 'required',
            'targetaudience' => 'required',
            'linkany' => 'required',
            'campaingn_date' => 'required',
            'link' => 'required',
            'notes' => 'required',
            'status' => 'required',
        ];
    }
}
