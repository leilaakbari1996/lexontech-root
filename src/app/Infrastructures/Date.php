<?php

namespace Lexontech\Root\app\Infrastructures;


use Morilog\Jalali\CalendarUtils;

class Date
{

    public function ConvertDateToJalali($date,$format='%B %d، %Y')
    {
        if(is_null($date)) return null;
        $date = CalendarUtils::strftime($format, strtotime($date));
        return $date;
    }
}
