<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class BudgetFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'budget';
    }
}
