<?php

namespace Cxj\LookingGlass;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Cxj\LookingGlass\Commands\LookingGlassCommand;

class LookingGlassServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-looking-glass-client')
            ->hasConfigFile()
            ->hasCommand(LookingGlassCommand::class);
    }
}
