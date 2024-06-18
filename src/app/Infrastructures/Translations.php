<?php

namespace Lexontech\Root\app\Infrastructures;

class Translations
{

    public const array =
        [
            'ServicePage'          => 'صفحه ی خدمات',
            'Member'               => 'کاربر',
            'Admin'                => 'ادمین',
            'QuickAccess'          => 'آیکون پشتیبانی',
            'SiteTitle'            => "عنوان سایت",
            'SiteDescription'      => 'توضیحات سایت',
            'Location'             => 'مکان',
            'PhoneNumber1'         => ' شماره تلفن 1',
            'PhoneNumber2'         => ' شماره تلفن 2',
            'EmailAddress1'        => 'ایمیل 1',
            'EmailAddress2'        => 'ایمیل 2',
            'InstagramAddress'     => 'آدرس اینستاگرام',
            'TwitterAddress'       => 'آدرس توییتر',
            'LinkedinAddress'      => 'آدرس لینکدین',
            'Logo'                 => 'لوگو',
            'FavIcon'              => 'فاو آیکون',
            'CustomHead'           => 'هدر سفارشی',
            'CustomFooter'         => 'فوتر سفارشی',
            'Footer'               => 'فوتر'      ,
            'AboutUsPage'          => 'صفحه ی ارتباط با ما',
            'ContactUS'            => 'تماس با ما',
            'services'             => 'خدمات',
            'CopyRight'            => 'کپی رایت',
            'ReplaceProfilePicture' => 'جایزیگن کردن عکس در صورت موجود نبودن عکس پروفایل',
            'DimensionsOfServicePhotos' => '  ابعاد تصاویر سرویس ها (فرمت به شکل 400px * 400px باشد.)',
            'DimensionsOfUserPhotos' => ' ابعاد تصاویر کاربران (فرمت به شکل 400px * 400px باشد.)',
    ];

    public static function translations($key)
    {
        $value = null;
        if(array_key_exists($key,self::array)) $value = self::array[$key];
        if(is_null($value)) $value = $key;
        return $value;
    }
}
