<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as FakerFactory;
use Faker\Generator as FakerGeneator;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    public function register()
    {
        $this->app->singleton(FakerGeneator::class, function() {
           return FakerFactory::create('pl_PL');
        });
    }
}
