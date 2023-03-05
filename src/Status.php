<?php

namespace Cxj\LookingGlass;

enum Status: string
{
    case ok = 'ok';
    case warning = 'warning';
    case failed = 'failed';
    case crashed = 'crashed';
    case skipped = 'skipped';
}
