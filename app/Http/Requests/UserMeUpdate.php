<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Utils\FormRequestUtil;

class UserMeUpdate extends FormRequestUtil
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
            'id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:user,email,'.$this->id,
            'phone' => 'required|mobile_phone_fr|unique:user,phone,'.$this->id,
            'password' => 'required|between:6,20'
        ];
    }

}