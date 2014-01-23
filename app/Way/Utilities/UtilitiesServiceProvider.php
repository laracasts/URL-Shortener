<?php namespace Way\Utilities;

use Illuminate\Support\ServiceProvider;
use Way\Utilities\UrlHasher;

class UtilitiesServiceProvider extends ServiceProvider {

    /**
     * Register in IoC container
     */
    public function register()
    {
        $this->app->bind('Way\Utilities\UrlHasher', function()
        {
            $length = 5;

            return new UrlHasher($length);
        });
    }

}
