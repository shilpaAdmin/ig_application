<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RunOrderRequest extends FormRequest
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
            'timeline' => 'required',
            'app_lang' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'duration' => 'required',
            'next_run_order' => 'required',
            'total_stories' => 'required',
            'total_advertisement' => 'required',
            'total_slide_show' => 'required',
            'total_video' => 'required',
            'live_striming' => 'required',
            'live_begin_time' => 'required',
            'live_begin_end_time' => 'required',
            'live_begin_duration' => 'required',
            'prepared_by' => 'required',
            'approved_by' => 'required',
        ];
    }
}
