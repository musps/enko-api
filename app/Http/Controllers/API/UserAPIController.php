<?php

namespace App\Http\Controllers\API;

use Validator;
use Illuminate\Http\Request;
use App\Utils\ApiControllerUtil;
use App\Models\UserModel;
use App\Http\Requests\UserRegister;
use App\Providers\JsonWebTokenProvider;

class UserAPIController extends ApiControllerUtil
{

    public function showAll()
    {
        $users = UserModel::all();
        return $this->sendResponse($users->toArray(), 'Users retrieved successfully.');
    }

    public function findById(Request $request, $id) 
    {
        $user = UserModel::where('id', $id)->first();
        return $this->sendResponse($user->toArray(), 'User retrieved successfully.');
    }

    public function register(UserRegister $request) 
    {
        $user = new UserModel;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->save();
        return $this->sendResponse($user->toArray(), 'Users retrieved successfully.');
    }

}
