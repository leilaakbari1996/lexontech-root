<?php

namespace Lexontech\Root\app\Facades\Root;

use Illuminate\Support\Facades\Facade;

class Date extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'DateJalali';
    }
}
