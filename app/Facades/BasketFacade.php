<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class BasketFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'basket';
    }
}
