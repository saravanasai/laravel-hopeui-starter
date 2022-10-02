<?php

namespace  Saravanasai\Hopeui\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

class HopeUiCommand extends Command
{
    public $signature = 'hope-ui:setup';

    public $description = 'Command to install & setup HopeUi';

    public function handle(): int
    {

        $defaultIndex = 0;
        $maxAttempts = null;
        $allowMultipleSelections = false;

        $scaffoldType = $this->choice(
            'Choose The Authentication Type',
            ['only-Login', 'Login-&-Registration'],
            $defaultIndex,
            $maxAttempts,
            $allowMultipleSelections
        );

        $this->requireComposerPackages('livewire/livewire:^2.10');

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/assets/', public_path('assets'));


        if ($scaffoldType == 'only-Login') {
            $this->handleOnlyLoginScaffold();
        } else {
            $this->handleLoginAndRegistrationScaffold();
        }

        copy(__DIR__ . '/../../resources/seeder/DatabaseSeeder.php', database_path('seeders/DatabaseSeeder.php'));

        $this->info('Installing the Project Scaffolding');

        $this->comment('Process Completed');

        return self::SUCCESS;
    }


    public function handleOnlyLoginScaffold()
    {

        file_put_contents(
            base_path('routes/web.php'),
            file_get_contents(__DIR__ . '/../../resources/routes/onlyLogin/routes.stub'),
            FILE_APPEND
        );

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/onlyLogin', resource_path('views'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/handlers/onlyLogin', app_path('Http'));
    }

    public function handleLoginAndRegistrationScaffold()
    {

        file_put_contents(
            base_path('routes/web.php'),
            file_get_contents(__DIR__ . '/../../resources/routes/loginAndRegistration/routes.stub'),
            FILE_APPEND
        );

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/loginAndRegistration', resource_path('views'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/handlers/loginAndRegistration', app_path('Http'));
    }


    /**
     * Installs the given Composer Packages into the application.
     * Taken from https://github.com/laravel/breeze/blob/1.x/src/Console/InstallCommand.php
     *
     * @param mixed $packages
     * @return void
     */
    protected function requireComposerPackages($packages)
    {

        (new Process(['composer', 'require', $packages], base_path(), ['COMPOSER_MEMORY_LIMIT' => '-1']))
            ->setTimeout(null)
            ->run(function ($type, $output) {
                $this->output->write($output);
            });
    }
}
