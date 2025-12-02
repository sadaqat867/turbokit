<?php

namespace Smartcode\Turbokit\Facades;

use Illuminate\Support\Facades\Facade;

class TurboKit extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor()
    {
        return 'turbokit';
    }
}
