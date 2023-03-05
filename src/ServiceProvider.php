<?php

namespace Cxj\LookingGlass;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Foundation\Console\AboutCommand;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Exceptions\InvalidPackage;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Cxj\LookingGlass\Commands\LookingGlassCommand;
use Spatie\WebhookServer\WebhookCall;
use Spatie\WebhookServer\WebhookServerServiceProvider;

class ServiceProvider extends PackageServiceProvider
{
    const VERSION = '0.0.2';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-looking-glass-client')
            ->hasConfigFile('looking-glass')
            ->hasCommand(LookingGlassCommand::class)
            ->hasInstallCommand(function (InstallCommand $command) {
                $command->publishConfigFile();
            });
    }

    /**
     * @throws InvalidPackage
     */
    public function register()
    {
        $this->app->bind('LookingGlass', function ($app) {
            return new LookingGlass();
        });

        parent::register();  // 🙄
    }


    public function boot(): void
    {
        // Register commands.
        AboutCommand::add(
            'Looking Glass Client',
            fn() => [
                'Version' => self::VERSION,
                'Repo'    => 'https://github.com/cxj/laravel-looking-glass-client'
            ]
        );

        // Make dependency package(s) available.
        $this->app->register(WebhookServerServiceProvider::class);
        $loader = AliasLoader::getInstance();
        $loader->alias('WebhookCall', WebhookCall::class);

        parent::boot(); // 🙄
    }
}
