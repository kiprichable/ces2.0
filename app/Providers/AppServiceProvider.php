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

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
                \App\Repositories\Availability\AvailabilityInterfaceContract::class,
                \App\Repositories\Availability\AvailabilityInterface::class
        );

        $this->app->bind(
                \App\Repositories\Employee\EmployeeInterfaceContract::class,
                \App\Repositories\Employee\EmployeeInterface::class
        );
    }
}
