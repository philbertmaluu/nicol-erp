<?php

namespace App\Enums;

enum PollStatus: string
{
    case PENDING = 'PENDING';
    case STARTED = 'STARTED';
    case FINISHED = 'FINISHED';
}
