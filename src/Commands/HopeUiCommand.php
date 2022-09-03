<?php

namespace  Saravanasai\Hopeui\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class HopeUiCommand extends Command
{
    public $signature = 'hope-ui:setup';

    public $description = 'Command to install & setup HopeUi';

    public function handle(): int
    {
        $this->info('Installing the Hope UI');

        file_put_contents(
            base_path('routes/web.php'),
            file_get_contents(__DIR__ . '/../../resources/routes.stub'),
            FILE_APPEND
        );

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/assets/', public_path('assets'));

        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/stubs/', resource_path('views'));

        $this->comment('Process Completed');

        return self::SUCCESS;
    }
}
