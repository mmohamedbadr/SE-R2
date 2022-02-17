<?php

namespace App\Http\Requests\member;

use App\Http\Requests\BaseRequest;
use Rees\Sanitizer\SanitizerServiceProvider;

class StoreRequest extends BaseRequest
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
            'first_name'=>'required|string|min:2|max:20|'
        ];
    }
     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            // 'email.required' => 'Email is required!',
            // 'name.required' => 'Name is required!',
            // 'password.required' => 'Password is required!'
        ];
    }
}
