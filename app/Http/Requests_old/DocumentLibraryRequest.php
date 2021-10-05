<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StockRequest extends Request
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
     * Get the validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'media_type.required' => 'This field is required.',
            'media_file.required' => 'This field is required.',
            'title.required' => 'This field is required.',
            'description.required' => 'This field is required.',           
            'tags.required' => 'This field is required.',
            'uploaded_by.numeric' => 'Only Numeric allow.',
            'upload_date.required' => 'This field is required.'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'media_type' => 'required',
			'media_file' => 'required',
			'title' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'uploaded_by' => 'required|numeric',
            'upload_date'=>'required',
        ];
    }
}
