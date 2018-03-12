<?php

namespace App\Http\Controllers;

use App\Utils\RequestUtil as Request;
// --- Models.
use App\Models\UserModel;
use App\Models\UserAddressModel;
// --- Validators.
use App\Http\Requests\UserAddressRequest;
use App\Http\Requests\UserAddressUpdateRequest;
// --- Tools.
use App\Utils\ApiControllerUtil;
use App\Providers\JsonWebTokenProvider;

class UserAddressController extends ApiControllerUtil
{

    public function list(Request $request)
    {
        $data = UserAddressModel::where('user', $request->getUserId())->get();
        return $this->sendResponse($data->toArray(), 'Users retrieved successfully.');
    }

    public function findById(Request $request, $id) 
    {
        $userAddress = UserAddressModel::where('id', $id)
            ->where('user', $request->getUserId())
            ->first();
        if (empty($userAddress)) {
            return $this->sendError('user.address.not_found');
        }
        return $this->sendResponse($userAddress->toArray(), 'User retrieved successfully.');
    }

    public function create(UserAddressRequest $request)
    {
        $userAddress = new UserAddressModel;
        $userAddress->user = $request->getUserId();
        $userAddress->tag = $request->tag;
        $userAddress->firstname = $request->firstname;
        $userAddress->lastname = $request->lastname;
        $userAddress->phone = $request->phone;
        $userAddress->country = 'FR';
        $userAddress->street = $request->street;
        $userAddress->city = $request->city;
        $userAddress->state = $request->state;
        $userAddress->zipCode = $request->zipCode;
        $userAddress->save();
        return $this->sendResponse($userAddress->toArray(), 'User retrieved successfully.');
    }

    public function update(UserAddressUpdateRequest $request)
    {
        $userAddress = UserAddressModel::where('id', $request->id)
            ->where('user', $request->getUserId())
            ->first();
        if (empty($userAddress)) {
            return $this->sendError('user.address.not_found');
        }
        $userAddress->tag = $request->tag;
        $userAddress->firstname = $request->firstname;
        $userAddress->lastname = $request->lastname;
        $userAddress->phone = $request->phone;
        $userAddress->country = 'FR';
        $userAddress->street = $request->street;
        $userAddress->city = $request->city;
        $userAddress->state = $request->state;
        $userAddress->zipCode = $request->zipCode;
        $userAddress->save();
        return $this->sendResponse($userAddress->toArray(), 'User retrieved successfully.');
    }

    public function delete(Request $request, $id)
    {
        $userAddress = UserAddressModel::where('id', $id)
            ->where('user', $request->getUserId())
            ->first();
        if (empty($userAddress)) {
            return $this->sendError('user.address.not_found');
        }
        $userAddress->delete();
        return $this->sendResponse($userAddress->toArray(), 'User retrieved successfully.');
    }

}

