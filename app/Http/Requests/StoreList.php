<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreList extends FormRequest
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
    /*
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'list_name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'list_name.required' => 'You have to enter a name for the list'
        ];
    }
}
