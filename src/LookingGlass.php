<?php

namespace Cxj\LookingGlass;

use Spatie\WebhookServer\WebhookCall;

class LookingGlass
{
    public function handle(Result $result): void
    {
        // Send this status to Looking Glass.
        WebhookCall::create()
                   ->url(config('looking-glass.url'))
                   ->payload(
                       [
                           'name'   => config('looking-glass.name'),
                           'result' => $result,
                           'label'  => config('looking-glass.label'),
                       ]
                   )
                   ->withHeaders(['App-Name' => config('looking-glass.name')])
                   ->useSecret(config('looking-glass.secret'));
    }
}
