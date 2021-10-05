<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        if(!empty($this->has('id')) && $this->has('id') > 0)
        {
            return [
                //'name' => 'required|unique:document_type,title,'.$this->id,
                'name' => 'required|unique:category,name,'.$this->id,
                'description' => 'required',
            ];   
        }
        else
        {
            return [
                //'name' => 'required|unique:document_type,title,'.$this->id,
                'name' => 'required|unique:category,name,'.$this->id,
                'description' => 'required',
                'media_file' => 'required|mimes:jpeg,png'
            ];
        }
    }
}
