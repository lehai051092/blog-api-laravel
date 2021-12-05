<?php

namespace App\Providers;

use App\Repositories\Api\v1\CustomerRepository;
use App\Repositories\Api\v1\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Backend\AdminRepository;
use App\Repositories\Backend\CityRepository;
use App\Repositories\Backend\CountryRepository;
use App\Repositories\Backend\DistrictRepository;
use App\Repositories\Backend\Interfaces\AdminRepositoryInterface;
use App\Repositories\Backend\Interfaces\CityRepositoryInterface;
use App\Repositories\Backend\Interfaces\CountryRepositoryInterface;
use App\Repositories\Backend\Interfaces\DistrictRepositoryInterface;
use App\Repositories\Backend\Interfaces\RoleRepositoryInterface;
use App\Repositories\Backend\RoleRepository;
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
        //// Backend
        // Admin
        $this->app->singleton(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->singleton(AdminServicesInterface::class, AdminService::class);
        // Role
        $this->app->singleton(RoleRepositoryInterface::class, RoleRepository::class);
        // Country
        $this->app->singleton(CountryRepositoryInterface::class, CountryRepository::class);
        // City
        $this->app->singleton(CityRepositoryInterface::class, CityRepository::class);
        // District
        $this->app->singleton(DistrictRepositoryInterface::class, DistrictRepository::class);

        //// Api
        // Customer
        $this->app->singleton(CustomerRepositoryInterface::class, CustomerRepository::class);
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
