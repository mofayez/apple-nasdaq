<?php

namespace App\Providers;

use App\Application\CompanyService;
use App\Application\UserService;
use App\Domains\User\Repositories\UserRepository;
use App\Domains\User\Repositories\IUserRepository;
use App\Domains\Company\Repositories\CompanyRepository;
use App\Domains\Company\Repositories\ICompanyRepository;
use App\Domains\Company\Services\IStockService;
use App\Domains\Company\Services\StockService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IUserRepository::class, function () {
            return new UserRepository();
        });
        $this->app->bind(UserService::class, function ($app) {
            return new UserService($app->make(IUserRepository::class));
        });
    
        $this->app->bind(ICompanyRepository::class, CompanyRepository::class);
        $this->app->bind(IStockService::class, StockService::class);
        $this->app->bind(CompanyService::class, function ($app) {
            return new CompanyService(
                $app->make(ICompanyRepository::class),
                $app->make(IStockService::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
