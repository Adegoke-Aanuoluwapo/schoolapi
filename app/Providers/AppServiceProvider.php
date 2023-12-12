<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Rules\DigitRule;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Validator::extend('digit', function ($attribute, $value, $parameters, $validator) {
            $rule = new DigitRule;
            return $rule->passes($attribute, $value);
        });
    }
}
