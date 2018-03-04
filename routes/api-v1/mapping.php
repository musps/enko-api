<?php

/**
 * /api/v1/user/*
 * 
 */

Route::prefix('user')->group(function () 
{

    Route::get('/', 'API\UserAPIController@showAll');

    Route::get('/findById/{id}', 'API\UserAPIController@findById')
    ->where('id', '[0-9]+')
    ->middleware('checkBearerToken');

    Route::post('/register', 'API\UserAPIController@register');
});