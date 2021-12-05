<?php

namespace App\Providers;

use App\Repositories\Eloquent\FrontRepository;
use App\Repositories\Interfaces\FrontRepositoryInterface;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FrontRepositoryInterface::class,FrontRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
