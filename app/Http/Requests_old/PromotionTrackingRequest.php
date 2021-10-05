<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionTrackingRequest extends FormRequest
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
            'medium_id' => 'required',
            'activity' => 'required',
            'budget' => 'required',
            'approvedby' => 'required',
            'duration' => 'required',
            'size' => 'required',
            'others' => 'required',
        ];
    }
}
