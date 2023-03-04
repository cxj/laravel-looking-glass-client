<?php

namespace Cxj\LookingGlass\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Cxj\LookingGlass\LookingGlass
 */
class LookingGlass extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Cxj\LookingGlass\LookingGlass::class;
    }
}
