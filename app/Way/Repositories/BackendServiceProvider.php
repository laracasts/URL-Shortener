<?php namespace Way\Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {

    /**
     * Register bindings with IoC container
     */
    public function register()
    {
        $this->app->bind(
            'Way\Repositories\LinkRepositoryInterface',
            'Way\Repositories\DbLinkRepository'
        );
    }

}
