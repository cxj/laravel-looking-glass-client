<?php

namespace Cxj\LaravelLookingGlassClient\Commands;

use Illuminate\Console\Command;

class LookingGlassCommand extends Command
{
    public $signature = 'looking-glass';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
