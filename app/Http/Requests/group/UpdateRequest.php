<?php

namespace App\Http\Requests\group;

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
            'id' => 'required|integer|min:1|max:1000000|exists:groups,id,deleted_at,null',
            'name' => 'required|string|min:3|max:50',
            'code' => 'required|integer|min:1|max:1000|unique:groups,code,' . $this->id,
            'note' => 'sometimes|string|min:3|max:1000',
            'image_id' => 'nullable|min:1|max:1000000|exists:images,id',
            'is_active' => 'required|integer|min:0|max:1'
        ];
    }
}
