<?php

/**
 * /api/v1/user/*
 * 
 */

/*
Route::prefix('user')->group(function () 
{

    Route::get('/', 'API\UserAPIController@showAll');
    Route::get('/findById/{id}', 'API\UserAPIController@findById')->where('id', '[0-9]+');
    Route::post('/register', 'API\UserAPIController@register')
        ->middleware("checkPostParameter:
            firstname:string,
            lastname:string',
            'email' => 'email',
            'password' => 'string'
        ");
});
*/

Route::prefix('user')->group(function () 
{

    Route::get('/', 'API\UserAPIController@showAll');
    Route::get('/findById/{id}', 'API\UserAPIController@findById')->where('id', '[0-9]+');
    Route::post('/register', 'API\UserAPIController@register');
});