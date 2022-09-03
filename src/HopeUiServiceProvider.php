<?php

namespace Saravanasai\Hopeui;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Saravanasai\Hopeui\Commands\HopeUiCommand;

class HopeUiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('hopeui')
            ->hasCommand(HopeUiCommand::class);
    }
}
