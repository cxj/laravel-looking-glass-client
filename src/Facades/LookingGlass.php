<?php

namespace Cxj\LookingGlass\Facades;

use Cxj\LookingGlass\Result;
use Illuminate\Support\Facades\Facade;

/**
 * @see \Cxj\LookingGlass\LookingGlass
 *
 * @method static transmit(string $label, Result $result, string $appName))
 */
class LookingGlass extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Cxj\LookingGlass\LookingGlass::class;
    }
}
