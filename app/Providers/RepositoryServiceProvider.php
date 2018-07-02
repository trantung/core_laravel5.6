<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(\App\Repositories\Systems\BranchRepository::class, \App\Repositories\Systems\BranchRepositoryEloquent::class);
        //:end-bindings:
    }
}
