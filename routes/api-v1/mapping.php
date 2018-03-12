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
Route::prefix('user')->middleware('checkBearerToken')->group(function () 
{
    Route::get('/me', 'UserController@me');
    Route::post('/me/update', 'UserController@meUpdate');
});

/**
 * /api/v1/user/address/*
 */
Route::prefix('user/address')->middleware('checkBearerToken')->group(function () 
{
    Route::get('/findById/{id}', 'UserAddressController@findById')
        ->where('id', '[0-9]+');
    Route::get('/list', 'UserAddressController@list');
    Route::post('/create', 'UserAddressController@create');
    Route::post('/update', 'UserAddressController@update');
    Route::delete('/delete/{id}', 'UserAddressController@delete')
        ->where('id', '[0-9]+');
});

/**
 * /api/v1/admin/*
 */
Route::prefix('admin')->group(function () 
{
    Route::get('/user/', 'UserController@showAll');
    Route::get('/findById/{id}', 'UserController@findById')
        ->where('id', '[0-9]+');
});