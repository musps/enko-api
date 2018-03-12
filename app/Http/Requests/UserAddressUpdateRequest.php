<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Utils\FormRequestUtil;

class UserAddressUpdateRequest extends FormRequestUtil
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
            'id' => 'required|integer',
            'tag' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|mobile_phone_fr',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipCode' => 'required|digits:5'
        ];
    }

}