<?php

namespace App\Providers;

use App\Interfaces\Auth\AuthRegisterRepositoryInterface;
use App\Interfaces\Auth\AuthRegisterServiceInterface;
use App\Repositories\Auth\AuthRegisterRepository;
use App\Services\Auth\AuthRegisterService;
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
            AuthRegisterService::class,
        );
        $this->app->bind(
            AuthRegisterRepositoryInterface::class,
            AuthRegisterRepository::class,
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
