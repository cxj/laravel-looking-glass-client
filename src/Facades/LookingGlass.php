<?php

namespace Cxj\LaravelLookingGlassClient\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Cxj\LaravelLookingGlassClient\LookingGlass
 */
class LookingGlass extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Cxj\LaravelLookingGlassClient\LookingGlass::class;
    }
}
