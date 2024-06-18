<?php

namespace Lexontech\Root\database\seeders\Root;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;
use Lexontech\Root\app\Models\Setting;
use function Symfony\Component\Translation\t;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        //DimensionsOfServicePhotos
        $values = [
            'link' => '200px * 200px',
        ];

        $setting = Setting::updateOrCreate(
            ["Key" => Setting::DimensionsOfServicePhotos],
            [
                "Value" => $values,
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::DimensionsOfServicePhotos,link: true);
        $setting->save();
        //QuickAccess
        $values = [
            'link' => '09100000000',
        ];

        $setting = Setting::updateOrCreate(
            ["Key" => Setting::QuickAccess],
            [
                "Value" => $values,
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::QuickAccess,link: true);
        $setting->save();

        //CopyRight
        $values = [
            'link' => 'کپی رایت © 1400. تمام حقوق قالب محفوظ است. طراحی توسط'
        ];

        $setting = Setting::updateOrCreate(
            ["Key" => Setting::CopyRight],
            [
                "Value" => $values,
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::CopyRight,link: true);
        $setting->save();

        //SiteTitle
        $values = [
            'title' => 'سایت لکسون تک'
        ];

        $setting = Setting::updateOrCreate(
            ["Key" => Setting::SiteTitle],
            [
                "Value" => $values,
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::SiteTitle,title: true);
        $setting->save();

        //SiteDescription
        $values = [
            'text' => 'سایت لکسون تک'
        ];

        $setting = Setting::updateOrCreate(
            ["Key" => Setting::SiteDescription],
            [
                "Value" => $values,
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::SiteDescription,text: true);
        $setting->save();

        //ReplaceProfilePicture
        $values = [
            'image' => './client/uploads/18.jpg'
        ];

        $setting = Setting::updateOrCreate(
            ["Key" => Setting::ReplaceProfilePicture],
            [
                "Value" => $values,
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::ReplaceProfilePicture,image: true);
        $setting->save();

        //LinkedinAddress
        $values = [
            'link' => 'linkedin.com/lexontech'
        ];

        $setting = Setting::updateOrCreate(
            ["Key" => Setting::LinkedinAddress],
            [
                "Value" => $values,
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::LinkedinAddress,link: true);
        $setting->save();

        $values = [
            'link' => 'twitter.com/lexontech'
        ];
        $setting = Setting::updateOrCreate(
            ["Key" => Setting::TwitterAddress],
            [
                "Value" => $values,
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::TwitterAddress,link: true);
        $setting->save();

        //contact US
        $values =[
            'link' =>
                '07136132941'
        ];
        $setting = Setting::updateOrCreate(
            ["Key" => Setting::PhoneNumber1],
            [
                "Value" => $values,
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::PhoneNumber1,link: true);
        $setting->save();

        $values =[
            'link' =>
                '07136132946'

        ];
        $setting = Setting::updateOrCreate(
            ["Key" => Setting::PhoneNumber2],
            [
                "Value" => $values,
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::PhoneNumber2,link: true);
        $setting->save();

        $values = [
            'link'=>'contact@lexontech.net'
        ];

        $setting = Setting::updateOrCreate(
            ["Key" => Setting::EmailAddress1],
            [
                "Value" => $values,
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::EmailAddress1,link: true);
        $setting->save();

        $values = [
            'link'=>'info@lexontech.net'
        ];

        $setting = Setting::updateOrCreate(
            ["Key" => Setting::EmailAddress2],
            [
                "Value" => $values,
            ]
        );

        $setting->Field = Setting::FieldSetting(key: Setting::EmailAddress2,link: true);
        $setting->save();

        $values = [
            'link' => 'ایران ، استان تهران ، میدان آزادی ، خیابان 9 شرقی'
        ];
        $setting = Setting::updateOrCreate(
            ["Key" => Setting::Location],
            [
                "Value" => $values,
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::Location,link: true);
        $setting->save();

        $values = [
            'link' => 'Lexontech44'
        ];

        $setting = Setting::updateOrCreate(
            ["Key" => Setting::InstagramAddress],
            [
                "Value" => $values,
            ]
        );
        $setting->Field =  Setting::FieldSetting(key: Setting::InstagramAddress,link: true);
        $setting->save();

        //Header

        $image = './client/uploads/logo.png';
        $values = [
            'image' => $image,
            'imageSize' => '95px * 45px',
            'link' => '/'
        ];

        $setting = Setting::updateOrCreate(
            ["Key" => Setting::Logo],
            [
                "Value" => $values,
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::Logo,link: true,image: true);
        $setting->save();

        //ServicePage
        $values = [
            'image'=>'./client/uploads/1.jpg',
            'imageSize'=> '1920px * 402px',
            'title' => 'خدمات',
        ];

        $setting =  Setting::updateOrCreate(
            ['Key' => Setting::ServicePage],
            [
                'Value' => $values,
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::ServicePage,image: true,title: true);
        $setting->save();

        //AboutUsPage
        $values = [
            'image'=>'./client/uploads/1.jpg',
            'imageSize'=>'1920px * 402px',
            'title' => 'درباره ما',
        ];
        $setting =  Setting::updateOrCreate(
            ['Key' => Setting::AboutUsPage],
            [
                'Value' => $values,
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::AboutUsPage,image: true,title: true);
        $setting->save();

        //ContactUS
        $values = [
            'title' => 'تماس با ما',
            'text'  => 'روزهای زوج ساعت ۱۰ صبح',
        ];

        $setting = Setting::updateOrCreate(
            ['Key' => Setting::ContactUS],
            [
                'Value' => $values,
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::ContactUS,text: true,title: true);
        $setting->save();

        $values = [
            'image'=>'./client/uploads/14.png',
        ];

        $setting = Setting::updateOrCreate(
            ['Key' => Setting::Footer],
            [
                'Value' => $values,
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::Footer,image: true);
        $setting->save();

        //index

        $values = [
            'image' => "./uploads/settings/fav-icon/16931421296432.png"
        ];

        $setting = Setting::updateOrCreate(
            ["Key" => Setting::FavIcon],
            [
                "Value" => $values,
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::FavIcon,image: true);
        $setting->save();

        $setting = Setting::updateOrCreate(
            ["Key" => Setting::CustomHead],
            [
                "Value" => '',
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::CustomHead,text: true);
        $setting->save();

        $setting = Setting::updateOrCreate(
            ["Key" => Setting::CustomFooter],
            [
                "Value" => '',
            ]
        );
        $setting->Field = Setting::FieldSetting(key: Setting::CustomFooter,text: true);
        $setting->save();
    }
}
