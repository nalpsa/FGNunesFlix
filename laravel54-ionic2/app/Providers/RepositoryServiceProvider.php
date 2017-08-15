<?php

namespace FGNunesFlix\Providers;

use FGNunesFlix\Repositories\CategoryRepository;
use FGNunesFlix\Repositories\CategoryRepositoryEloquent;
use FGNunesFlix\Repositories\SerieRepository;
use FGNunesFlix\Repositories\SerieRepositoryEloquent;
use FGNunesFlix\Repositories\UserRepository;
use FGNunesFlix\Repositories\UserRepositoryEloquent;
use FGNunesFlix\Repositories\VideoRepository;
use FGNunesFlix\Repositories\VideoRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(CategoryRepository::class, CategoryRepositoryEloquent::class);
        $this->app->bind(SerieRepository::class, SerieRepositoryEloquent::class);
        $this->app->bind(VideoRepository::class, VideoRepositoryEloquent::class);

       // $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        //:end-bindings:
    }
}
