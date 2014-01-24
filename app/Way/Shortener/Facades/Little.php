<?php namespace Way\Shortener\Facades;

use Illuminate\Support\Facades\Facade;

class Little extends Facade {

    /**
     * Get name of binding in IoC container
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'little';
    }

}
