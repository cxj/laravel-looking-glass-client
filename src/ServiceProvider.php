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
                $command
                    ->startWith(function (InstallCommand $command) {
                        $command->info('Imagine this actually working...');
                    }) // Does not work, Spatie?!
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub(
                        'cxj/laravel-looking-glass-client'
                    ) // Does not work, Spatie?!
                    ->endWith(function (InstallCommand $command) {
                        $command->info('Have a great day!');
                    }); // Does not work, Spatie?!
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

        // Make dependency package(s) available.
        $this->app->register(WebhookServerServiceProvider::class);
        $loader = AliasLoader::getInstance();
        $loader->alias('WebhookCall', WebhookCall::class);

        parent::boot(); // 🙄
    }
}
