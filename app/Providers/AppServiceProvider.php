<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Utils\RequestUtil;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('mobile_phone_fr', function ($attribute, $value, $parameters, $validator) {
            $pattern = '/^0[6|7][0-9]{8}$/';
            return preg_match($pattern, $value, $output);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // ---> Register custome Request class.
        $this->app->singleton(RequestUtil::class, function () {
             return RequestUtil::capture();
        });
        $this->app->alias(RequestUtil::class, 'request');
    }
}
