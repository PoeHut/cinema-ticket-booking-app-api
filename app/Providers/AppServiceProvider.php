<?php

namespace App\Providers;

use App\Repositories\SeatRepository;
use App\Repositories\UserRepository;
use App\Repositories\MovieRepository;
use App\Repositories\SeatNumRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ShowTimeMgmtRepository;
use App\Repositories\BookingServiceRepository;
use App\Repositories\Interfaces\SeatRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\MovieRepositoryInterface;
use App\Repositories\Interfaces\SeatNumRepositoryInterface;
use App\Repositories\Interfaces\ShowTimeMgmtRepositoryInterface;
use App\Repositories\Interfaces\BookingServiceRepositoryInterface;

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
        $this->app->bind(BookingServiceRepositoryInterface::class, BookingServiceRepository::class);
        $this->app->bind(SeatNumRepositoryInterface::class, SeatNumRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
