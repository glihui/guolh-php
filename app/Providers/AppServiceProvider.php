<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        \App\Models\User::observe(\App\Observers\UserObserver::class);
        \App\Models\Reply::observe(\App\Observers\ReplyObserver::class);
        \App\Models\zan::observe(\App\Observers\zanObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
