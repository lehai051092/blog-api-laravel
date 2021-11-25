<?php

namespace App\Providers;

use App\Repositories\Backend\AdminRepository;
use App\Repositories\Backend\Interfaces\AdminRepositoryInterface;
use App\Services\Backend\AdminService;
use App\Services\Backend\Interfaces\AdminServicesInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Admin
        $this->app->singleton(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->singleton(AdminServicesInterface::class, AdminService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
