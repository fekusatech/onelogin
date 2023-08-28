<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('recaptcha', function ($attribute, $value, $parameters, $validator) {
            $recaptcha = new \ReCaptcha\ReCaptcha(config('app.recaptcha_secret_key'));
            $response = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']);
            return $response->isSuccess();
        });
    }
}
