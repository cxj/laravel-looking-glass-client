<?php

namespace Cxj\LookingGlass;

use Illuminate\Foundation\Bus\PendingDispatch;
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

    public function transmit(Result $result): self
    {
        // Send this status to Looking Glass.
        $this->dispatch = WebhookCall
            ::create()
            ->url(config('looking-glass.url'))
            ->payload(
                [
                    'name'   => config(
                        'looking-glass.name'
                    ),
                    'result' => $result,
                    'label'  => config(
                        'looking-glass.label'
                    ),
                ]
            )
            ->withHeaders(
                [
                    'App-Name' => config(
                        'looking-glass.name'
                    )
                ]
            )
            ->useSecret(
                config('looking-glass.secret')
            )
            ->dispatch();

        return $this;
    }
}
