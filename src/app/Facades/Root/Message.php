<?php

namespace Lexontech\Root\app\Facades\Root;

use Illuminate\Support\Facades\Facade;

class Message extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'ReturnMessage';
    }
}
