<?php

namespace Lexontech\Root\app\Infrastructures;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Image;

class Media
{
    public static function CheckExistsFile($path)
    {
        return File::exists($path);
    }
    public static function CheckExistsFileCreate($path)
    {
        if(!File::exists($path))
        {
            File::makeDirectory($path,0755, true);
        }
    }

    public static function DeleteFile($url)
    {
        if(File::exists($url)) {
            File::delete([$url]);
        }
    }

    public static function folderTime()
    {
        return Carbon::parse(now())->format("Y_m");
    }

    public static function SaveFileExport()
    {
        $address = 'uploads/'.self::folderTime();
        self::CheckExistsFileCreate($address);
        $fileName = $address.'/'.time().rand(11123,8777773).'.xlsx';
        return $fileName;
    }

    public static function SaveFile($file,$url='/')
    {
        $address = 'templates/'.self::folderTime().$url;
        self::CheckExistsFileCreate($address);

        $ext = $file->getClientOriginalExtension();
        $fileName = time().rand(11123,8777773). '.' .$ext;
        $file->move($address, $fileName);
//        $item = [
//            'ext' => $ext,
//            'fileName' => $fileName
//        ];
        //thumbnail
        if (\session()->has('thumbnailPage'))
        {
            self::Thumbnail('/'.$address.$fileName,$url,$ext);
            \session()->forget('thumbnailPage');
        }
        return $address.$fileName;
    }

    public static function SaveFileInUploadsFolder($path,$url = '/')
    {
        $return       = [
            'Status' => false,
            'path'   => $path
        ];
        $isCheck      = self::CheckExistsFile($path);
        if (!$isCheck) return $return;

        $address         = 'uploads/'.self::folderTime().$url.'filepond';
        self::CheckExistsFileCreate($address);
        $pathNew         = str_replace('templates','uploads',$path);
        File::copy($path,$pathNew);
        self::DeleteFile($path);

        $return['Status'] = true;
        $return['path']   = $pathNew;

        return $return;
    }

    public static function Thumbnail($image,$url,$ext)
    {
        $manager = new ImageManager(new Driver());
        $image = $manager->read(public_path().$image);
//        $image->scale(width: 350);
        $image->scale(width: 416);
        $address = 'templates/'.self::folderTime().$url;
        self::CheckExistsFileCreate($address);

        $fileName = time().rand(11123,8777773). '.' .$ext;
        $image->toPng()->save($address.$fileName);
        Session::put('thumbnail', $address.$fileName);
    }

    public static function CheckImage($img1,$img2=null)
    {
        if(!is_null($img1))
        {
            $checkExit = Media::CheckExistsFile($img1);
            if($checkExit) return '/'.$img1;
        }
        if(!is_null($img2))
        {
            $checkExit = Media::CheckExistsFile($img2);
            if($checkExit) return '/'.$img2;
        }
        return null;
    }


}
