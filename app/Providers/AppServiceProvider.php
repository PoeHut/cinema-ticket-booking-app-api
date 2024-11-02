<?php

namespace App\Providers;

use App\Repositories\SeatRepository;
use App\Repositories\UserRepository;
use App\Repositories\MovieRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ShowTimeMgmtRepository;
use App\Repositories\Interfaces\SeatRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\MovieRepositoryInterface;
use App\Repositories\Interfaces\ShowTimeMgmtRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);
        $this->app->bind(ShowTimeMgmtRepositoryInterface::class, ShowTimeMgmtRepository::class);
        $this->app->bind(SeatRepositoryInterface::class, SeatRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
