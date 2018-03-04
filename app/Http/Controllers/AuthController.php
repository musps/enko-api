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

class AuthController extends ApiControllerUtil
{

    public function register(UserRegister $request) 
    {
        $user = new UserModel;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->enable = 1;
        $user->save();
        return $this->sendResponse($user->toArray(), 'Users retrieved successfully.');
    }

    public function logIn(UserLogin $request) 
    {
        $user = UserModel::where('email', $request->email)
            ->where('password', $request->password)
            ->first();
        if (empty($user)) {
            return $this->sendError('logIn.wrong_credentials');
        }

        $token = JsonWebTokenProvider::create($user);
        $key = explode('.', $token)[2];
        $userToken = new UserTokenModel;
        $userToken->user = $user->id;
        $userToken->key = $key;
        $userToken->save();

        return $this->sendResponse($token, 'User retrieved successfully.');
    }

    public function logOut(Request $request) 
    {
        $token = $request->bearerToken();
        $key = explode('.', $token)[2];
        $decoded = JsonWebTokenProvider::decode($token);

        $userToken = UserTokenModel::where('user', $decoded['id'])
            ->where('key', $key)
            ->first();
        if (! empty($userToken)) {
            $userToken->delete();
        }

        return $this->sendResponse(null, 'User retrieved successfully.');
    }

}
