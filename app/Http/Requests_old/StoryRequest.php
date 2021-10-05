<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
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
     required|max:50000*/
    public function rules()
    {
        return [
            'cover_detail' => 'required',
            'timeline_date' => 'required',
            'story_type_category' => 'required',
            'story_by' => 'required',
            'city' => 'required',
        ];
    }
}
