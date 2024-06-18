<?php

namespace Lexontech\Root\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "root_settings";
    protected $fillable =
        ['Key', 'Value','Field'];
    protected $casts = [
        "Value" => "array",
        "Field" => "array"
    ];

    public const SiteTitle = "SiteTitle";
    public const SiteDescription = 'SiteDescription';

    public const VideoSection = 'VideoSection';

    public const DimensionsOfServicePhotos = 'DimensionsOfServicePhotos';
    public const ReplaceProfilePicture = 'ReplaceProfilePicture';
    public const ReplaceImg = 'ReplaceImg';
    public const ReplaceAboutHospital = 'ReplaceAboutHospital';
    public const Location              = 'Location';
    public const PhoneNumber1   = 'PhoneNumber1';
    public const PhoneNumber2  = 'PhoneNumber2';
    public const EmailAddress1 = 'EmailAddress1';
    public const EmailAddress2 = 'EmailAddress2';
    public const InstagramAddress = 'InstagramAddress';
    public const TwitterAddress = 'TwitterAddress';
    public const LinkedinAddress = 'LinkedinAddress';

    public const QuickAccess     = 'QuickAccess';

    public const GetTurn         = 'GetTurn';
    public const Map             = 'Map';
    public const Logo             = 'Logo';
    public const FavIcon = 'FavIcon';
    public const CustomHead = 'CustomHead';
    public const CustomFooter = 'CustomFooter';
    public const LinkFooter5 = 'LinkFooter5';
    public const AboutOurHospital = 'AboutOurHospital';
    public const Expertise = 'Expertise';
    public const HospitalServices = 'HospitalServices';
    public const AboutHospitalPartTwo = 'AboutHospitalPartTwo';
    public const BlogPage = 'BlogPage';
    public const ServicePage = 'ServicePage';
    public const AboutUsPage = 'AboutUsPage';
    public const DoctorPage = 'DoctorPage';
    public const OurDoctor = 'OurDoctor';
    public const BlogNews = 'BlogNews';
    public const Footer = 'Footer';
    public const ContactUS = 'ContactUS';
    public const CopyRight = 'CopyRight';

    public $timestamps = false;

    //scope functions

    public function scopeOfID($q,$type)
    {
        return $q->where('id',$type);
    }

    public function scopeOfKey($q,$type)
    {
        return $q->where('Key',$type);
    }

    //static functions

    public static function GetSettings($filters,$selected=null)
    {
        $query = self::Search($filters);
        if(!is_null($selected)) $query = $query->select($selected);
        return $query->get();
    }

    public static function FieldSetting($key,$title=false,$text=false,$link=false,$image=false,$imageBackground=false,$video=false)
    {
        $filter['Key'] = $key;
        $setting       = self::GetSettings(filters: $filter)[0];
        $item          = [
            'title'                 => $title,
            'text'                  => $text,
            'link'                  => $link,
            'image'                 => $image,
            'imageBackground'       => $imageBackground,
            'video'                 => $video
        ];
//        $setting->Field = $item;
//        $setting->save();
        return $item;
    }


    // private functions

    private static function Search($filters,$query=null)
    {

        $query = self::query();

        if(isset($filters['id']) && !is_null($filters['id']))
        {
            $query = $query->ofID($filters['id']);
        }

        if(isset($filters['Key']) && !is_null($filters['Key']))
        {
            $query = $query->ofKey($filters['Key']);
        }

        return $query;
    }



}
