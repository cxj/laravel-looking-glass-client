<?php

namespace Cxj\LookingGlass;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Foundation\Console\AboutCommand;
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
            ->hasConfigFile('looking-glass.php')
            ->hasCommand(LookingGlassCommand::class);
    }

    public function register()
    {
        $this->app->bind('LookingGlass', function($app) {
            return new LookingGlass();
        });
    }


    public function boot(): void
    {
        // Publish config file.
//        $this->publishes([
//            __DIR__ . '/../config/looking-glass.php' => config_path(
//                'looking-glass.php'
//            ),
//        ]);

        // Register commands.
        AboutCommand::add(
            'Looking Glass Client',
            fn() => ['Version' => '0.0.1']
        );

//        if ($this->app->runningInConsole()) {
//            $this->commands([
//                LookingGlassCommand::class,
//            ]);
//        }

        // Make dependecy package(s) available.
        $this->app->register(WebhookServerServiceProvider::class);
        $loader = AliasLoader::getInstance();
        $loader->alias('WebhookCall', WebhookCall::class);
    }
}
