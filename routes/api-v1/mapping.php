<?php



/**
 * /api/v1/auth/*
 */
Route::prefix('auth')->group(function () 
{
    Route::post('/logIn', 'AuthController@logIn');
    Route::post('/register', 'AuthController@register');
    Route::post('/logOut', 'AuthController@logOut')
        ->middleware('checkBearerToken');
});

/**
 * /api/v1/user/*
 */
Route::prefix('user')->group(function () 
{
    Route::get('/', 'UserController@showAll');
    Route::get('/findById/{id}', 'UserController@findById')
        ->where('id', '[0-9]+')
        ->middleware('checkBearerToken');
    Route::get('/me', 'UserController@me')
        ->middleware('checkBearerToken');

    Route::post('/me/update', 'UserController@meUpdate')
      ->middleware('checkBearerToken');

});