<?php

namespace App\Utils;

use App\Providers\JsonWebTokenProvider;

class RequestUtil extends \Illuminate\Http\Request
{

    public function getUserId() {
        $decoded = JsonWebTokenProvider::decode($this->bearerToken());
        $id = $decoded['id'];
        return $id;
    }

}