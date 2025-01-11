<?php

namespace App\Providers;

use App\Models\Contract;
use App\Models\ContractLine;
use App\Models\InstallmentLine;
use App\Observers\ContractLineObserver;
use App\Observers\ContractObserver;
use App\Observers\InstallmentLineObserver;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        ContractLine::observe(ContractLineObserver::class);
        Contract::observe(ContractObserver::class);
        InstallmentLine::observe(InstallmentLineObserver::class);
    }
}
