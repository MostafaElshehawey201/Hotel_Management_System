<?php

namespace App\Providers;

use App\Interfaces\Auth\AuthLoginRepositoryInterface;
use App\Interfaces\Auth\AuthLoginServiceInterface;
use App\Interfaces\Auth\AuthRegisterRepositoryInterface;
use App\Interfaces\Auth\AuthRegisterServiceInterface;
use App\Interfaces\Auth\AuthResetPasswordEmailRepositoryInterface;
use App\Interfaces\Auth\AuthResetPasswordInterface;
use App\Interfaces\Auth\AuthResetPasswordRepositoryInterface;
use App\Repositories\Auth\AuthProcessRepository;
use App\Services\Auth\AuthProcessService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            AuthRegisterServiceInterface::class,
            AuthProcessService::class,
        );
        $this->app->bind(
            AuthRegisterRepositoryInterface::class,
            AuthProcessRepository::class,
        );
        $this->app->bind(
            AuthLoginServiceInterface::class,
            AuthProcessService::class,
        );
        $this->app->bind(
            AuthLoginRepositoryInterface::class,
            AuthProcessRepository::class,
        );
        $this->app->bind(
            AuthResetPasswordInterface::class,
            AuthProcessService::class,
        );
        $this->app->bind(
            AuthResetPasswordRepositoryInterface::class,
            AuthProcessRepository::class,
        );
        $this->app->bind(
            AuthResetPasswordEmailRepositoryInterface::class,
            AuthProcessRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
