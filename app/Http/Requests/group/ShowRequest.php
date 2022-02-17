<?php

namespace App\Http\Requests\group;

use App\Http\Requests\BaseRequest;

class ShowRequest extends BaseRequest
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
            'id' => 'required|integer|min:1|max:1000000|exists:groups,id'
        ];
    }
}
