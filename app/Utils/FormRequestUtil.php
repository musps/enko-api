<?php

namespace App\Utils;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Utils\ApiControllerUtil;

class FormRequestUtil extends FormRequest
{

    protected function failedValidation(Validator $validator) 
    {
        $re = new ApiControllerUtil;
        throw new HttpResponseException(
            $re->sendError($validator->errors())
        );
    }

}