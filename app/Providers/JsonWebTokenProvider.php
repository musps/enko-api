<?php

namespace App\Providers;

class JsonWebTokenProvider
{

    public static function create($data)
    {
        $token = \JWT::encode(
            $data,
            config('app.jwt_secret'),
            config('app.jwt_algo')
        );
        return $token;
    }

    public static function verify($token)
    {
        try {
            $decoded = \JWT::decode(
                $token,
                config('app.jwt_secret'),
                [config('app.jwt_algo')]
            );
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

}