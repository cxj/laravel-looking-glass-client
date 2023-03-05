<?php

namespace Cxj\LookingGlass\Commands;

use Cxj\LookingGlass\Facades\LookingGlass;
use Cxj\LookingGlass\Result;
use Illuminate\Console\Command;

class LookingGlassCommand extends Command
{
    public $signature = 'looking-glass:test';

    public $description = 'Sends a test status to Looking Glass';

    public function handle(): int
    {
        $result = Result::make('Test message from CLI');

        LookingGlass::transmit($result);

        $this->comment('All done');

        return self::SUCCESS;
    }
}
