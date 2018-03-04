<?php

namespace App\Http\Middleware;

use Closure;
use App\Utils\ApiControllerUtil;
use App\Providers\JsonWebTokenProvider;

class CheckBearerToken extends ApiControllerUtil
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty($request->bearerToken())) {
            return $this->sendError('jwt.token_empty');
        }
        if (!JsonWebTokenProvider::verify($request->bearerToken())) {
            return $this->sendError('jwt.token_invalid');
        }

        // --> 
        return $next($request);
    }

}