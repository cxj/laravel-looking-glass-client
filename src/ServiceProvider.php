<?php

namespace Cxj\LookingGlass;

use Illuminate\Foundation\AliasLoader;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Cxj\LookingGlass\Commands\LookingGlassCommand;
use Spatie\WebhookServer\WebhookCall;
use Spatie\WebhookServer\WebhookServerServiceProvider;

class ServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            // ->name('laravel-looking-glass-client')
            ->name('laravel-looking-glass')
            ->hasConfigFile()
            ->hasCommand(LookingGlassCommand::class);
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/looking-glass.php' => config_path(
                'looking-glass.php'
            ),
        ]);

        $this->app->register(WebhookServerServiceProvider::class);
        $loader = AliasLoader::getInstance();
        $loader->alias('WebhookCall', WebhookCall::class);
    }
}
