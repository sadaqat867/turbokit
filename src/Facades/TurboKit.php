<?php

namespace SmartCode\TurboKit\Facades;

use Illuminate\Support\Facades\Facade;

class TurboKit extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'turbokit';
    }
}
