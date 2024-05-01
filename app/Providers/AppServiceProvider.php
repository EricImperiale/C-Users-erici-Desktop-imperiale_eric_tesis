<?php

namespace App\Providers;

use App\Repositories\GuarantorEloquentRepository;
use App\Repositories\Interfaces\GuarantorRepository;
use App\Repositories\Interfaces\OwnerRepository;
use App\Repositories\Interfaces\PropertyRepository;
use App\Repositories\Interfaces\TenantRepository;
use App\Repositories\OwnerEloquentRepository;
use App\Repositories\PropertyEloquentRepository;
use App\Repositories\TenantEloquentRepository;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * @var array|string[]
     */
    public $bindings = [
        OwnerRepository::class => OwnerEloquentRepository::class,
        PropertyRepository::class => PropertyEloquentRepository::class,
        TenantRepository::class => TenantEloquentRepository::class,
        GuarantorRepository::class => GuarantorEloquentRepository::class,
    ];

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
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
