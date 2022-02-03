<?php

namespace App\Providers;

use App\Http\Controllers\PostController;
use App\interfaces\repositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\PostRepository;
use Illuminate\Support\ServiceProvider;

class ReposotiriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    //     $this->app->bind(
    //         repositoryInterface::class,ProductRepository::class
    //     );
    //     $this->app->bind(
    //         repositoryInterface::class,PostRepository::class
    //     );

        $this->app->when('App\Http\Controllers\PostController')
        ->needs('App\interfaces\repositoryInterface')
        ->give('App\Repositories\PostRepository');

    $this->app->when('App\Http\Controllers\ProductController')
        ->needs('App\interfaces\repositoryInterface')
        ->give('App\Repositories\ProductRepository');


        $this->app->when('App\Http\Controllers\api\ApiProductController')
        ->needs('App\interfaces\repositoryInterface')
        ->give('App\Repositories\ProductRepository');

        $this->app->when('App\Http\Controllers\api\PostController')
        ->needs('App\interfaces\repositoryInterface')
        ->give('App\Repositories\PostRepository');
    }



}
