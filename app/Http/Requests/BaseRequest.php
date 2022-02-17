<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;


class BaseRequest extends FormRequest
{
    public function all($keys = null)
    {
        $data = parent::all($keys);
        if ($this->route('id')) {
            $data['id'] = $this->route('id');
        }
        return $data;
    }
    /**
     *
     * @param  Validator $validator [description]
     * @return array
     */
    public function failedValidation(Validator $validator)
    {
        $response = [
            'ok' => false,
            'message' => __('Fail'),
            'errors' => $validator->errors(),
            'statusCode' => Response::HTTP_BAD_REQUEST,
        ];

        throw new HttpResponseException(response()->json($response, 400));
    }
}
