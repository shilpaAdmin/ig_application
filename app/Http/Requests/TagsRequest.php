<?php

namespace App\Http\Requests;
//use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class TagsRequest extends FormRequest
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
        /*       'name' => [
                   'required',
                   Rule::unique('tag_master', 'name')->ignore($this->post)
                   ]
               ];*/
        
          return [
            'name' => 'required|unique:tag_master,name,'.$this->id,
          ];
          
        //return $rules;
    }
}
