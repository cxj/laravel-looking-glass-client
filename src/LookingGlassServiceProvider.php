<?php

namespace Cxj\LaravelLookingGlassClient;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Cxj\LaravelLookingGlassClient\Commands\LaravelLookingGlassClientCommand;

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
