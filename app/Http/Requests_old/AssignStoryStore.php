<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignStoryStore extends FormRequest
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
            'title' => 'required|unique:story_type,title,' . $this->id,
            'description' => 'required',
            'story_type' => 'required',
            'assign_to' => 'required',
            'date' => 'required',
            'time' => 'required',

        ];
    }
}
