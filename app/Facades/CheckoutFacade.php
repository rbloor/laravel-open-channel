<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CheckoutFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'checkout';
    }
}
