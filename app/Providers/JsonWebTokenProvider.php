<?php

namespace App\Providers;

class JsonWebTokenProvider
{

    public static function create($data)
    {
        $tokenData = array(
            'iat' => time(),
            'exp' => time() + config('app.jwt_duration'),
            'data' => $data
        );

        $token = \JWT::encode(
            $tokenData,
            config('app.jwt_secret'),
            config('app.jwt_algo')
        );
        return $token;
    }

    public static function decode($token)
    {
        try {
            $decoded = \JWT::decode(
                $token,
                config('app.jwt_secret'),
                array(config('app.jwt_algo'))
            );
            return (array) $decoded->data;
        } catch (\Exception $e) {
            return false;
        }
    }

}