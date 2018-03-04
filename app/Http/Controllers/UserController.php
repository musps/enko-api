<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// --- Models.
use App\Models\UserModel;
use App\Models\UserTokenModel;
// --- Validators.
use App\Http\Requests\UserRegister;
use App\Http\Requests\UserLogIn;
// --- Tools.
use App\Utils\ApiControllerUtil;
use App\Providers\JsonWebTokenProvider;

class UserController extends ApiControllerUtil
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

}