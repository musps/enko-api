<?php

namespace App\Http\Middleware;

use App\Http\Controllers\API\APIBaseController as APIBaseController;
use Closure;

class CheckPostParameter extends APIBaseController
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $rules)
    {
        $validatedData = Validator::make($request->all(), [
            'username' => 'required'
        ]);

        if ($validatedData->fails()) {
            return $this->sendError('Post request error.', $validatedData->errors());
        }
    }
}
