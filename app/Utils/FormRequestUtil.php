<?php

namespace App\Utils;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Utils\ApiControllerUtil;
use App\Providers\JsonWebTokenProvider;

class FormRequestUtil extends FormRequest
{

    public function getUserId() {
        $decoded = JsonWebTokenProvider::decode($this->bearerToken());
        $id = $decoded['id'];
        return $id;
    }

    protected function failedValidation(Validator $validator) 
    {
        $re = new ApiControllerUtil;
        throw new HttpResponseException(
            $re->sendError(null, $validator->errors())
        );
    }

}