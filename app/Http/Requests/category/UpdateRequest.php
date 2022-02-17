<?php

namespace App\Http\Requests\category;

use App\Http\Requests\BaseRequest;

class UpdateRequest extends BaseRequest
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
            'id' => 'required|integer|min:1|max:1000000|exists:categories,id,deleted_at,NULL',
            "name" => "required|string|min:3|max:50|unique:categories,name," . $this->id,
            "code" => "required|unique:categories,code," . $this->id . "|integer|min:1|max:1000",
            "price" => "required|integer|min:1|max:1000",
            "is_active" => "required|integer|min:0|max:1",
        ];
    }
}
