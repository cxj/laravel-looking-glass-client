<?php

namespace Cxj\LookingGlass;

use Illuminate\Foundation\Bus\PendingDispatch;
use Illuminate\Support\Facades\Log;
use Spatie\WebhookServer\WebhookCall;

class LookingGlass
{
    private PendingDispatch $dispatch;

    /**
     * @return PendingDispatch
     */
    public function getDispatch(): PendingDispatch
    {
        return $this->dispatch;
    }

    public function transmit(
        string $testName,
        Result $result,
        string $appName = null
    ): self {
        $name = $appName ?? config('app.name');

        Log::debug('Using URL: ' . config('looking-glass.url')); // debug

        // Send this status to Looking Glass.
        $this->dispatch = WebhookCall
            ::create()
            ->throwExceptionOnFailure()
            ->url(config('looking-glass.url'))
            ->withHeaders(['App-Name' => $name])
            ->useSecret(config('looking-glass.secret'))
            ->payload(
                ['name' => $name, 'result' => $result, 'label' => $testName,]
            )
            ->dispatch();

        return $this;
    }
}
