<?php namespace Way\Shortener;

use Illuminate\Support\ServiceProvider;

class LittleServiceProvider extends ServiceProvider {

    /**
     * Register in IoC container
     */
    public function register()
    {
        $this->app->bind('little', 'Way\Shortener\LittleService');
    }

}
