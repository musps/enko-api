<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Utils\ApiControllerUtil;
use App\Models\UserModel;
use Validator;

use \App\Http\Requests\UserRegister;

class UserAPIController extends ApiControllerUtil
{

    public function showAll()
    {
        $users = UserModel::all();
        return $this->sendResponse($users->toArray(), 'Users retrieved successfully.');
    }

    public function findById($id) 
    {
        $user = UserModel::where('id', $id)->first();
        if(empty($user)) {
            return $this->sendError('User id not found.');
        }
        return $this->sendResponse($user->toArray(), 'User retrieved successfully.');
    }

    public function register(UserRegister $request) 
    {
        $users = UserModel::all();
        return $this->sendResponse($users->toArray(), 'Users retrieved successfully.');
    }

}
