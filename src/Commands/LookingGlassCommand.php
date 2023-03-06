<?php

namespace Cxj\LookingGlass\Commands;

use Cxj\LookingGlass\LookingGlass;
use Cxj\LookingGlass\Result;
use Illuminate\Console\Command;

class LookingGlassCommand extends Command
{
    public $signature = 'looking-glass:test';

    public $description = 'Sends a test status to Looking Glass';

    public function handle(): int
    {
        $result = Result::make('Test message from CLI');

        // todo Until we can quiet PHPStan about Facade static call.
        $glass = new LookingGlass();
        $glass->transmit('CLI Test', $result, null);

        $this->comment('Message queued for webhook job');

        return self::SUCCESS;
    }
}
