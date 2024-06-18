<?php

function explodeHelper($string,$separator)
{
    $string = explode($string,$separator);
    return $string[0];
}

function getUser()
{
    return \Illuminate\Support\Facades\Auth::user();
}

function setting($settings)
{
    $items = [];
    $settings = $settings->toArray();
    foreach ($settings as $setting)
    {

        $items[$setting['Key']] = $setting['Value'];
    }

    return $items;
}

function settingPanel($settings)
{
    $items = [];
    $settings = $settings->toArray();
    foreach ($settings as $setting)
    {

        $items[$setting['Key']] = $setting;
    }

    return $items;
}
function services($items)
{
    $array['services'] = $items->filter(function ($q){
        return $q->Type == \Lexontech\Root\app\Models\Service::Services;
    });

    $array['expertise'] = $items->filter(function ($q){
        return $q->Type == \Lexontech\Root\app\Models\Service::Expertise;
    });

    return $array;
}

function menus($items)
{
    $array['header'] = $items->filter(function ($q){
        return $q->Type == \Lexontech\Root\app\Models\Menu::Header;
    });

    $array['footer'] = $items->filter(function ($q){
        return $q->Type == \Lexontech\Root\app\Models\Menu::Footer;
    });

    return $array;
}

function userAccess($id)
{
    if(getUser()->Type == \Lexontech\AuthenticationSystem\app\Models\AuthenticationSystem\User::Admin) return $id;

    return getUser()->id;
}

function conventModel($collect)
{
    foreach ($collect as $item)
    {
        if(\Illuminate\Support\Str::contains($item->typeMorph,'Tag'))
        {
            $item->typeMorph = 'تگ';
            $item->href      = 'tags';
        }
        elseif(\Illuminate\Support\Str::contains($item->typeMorph,'Blog'))
        {
            $item->typeMorph = 'بلاگ';
            $item->href      = 'blogs';
        }
    }
    return $collect;
}


