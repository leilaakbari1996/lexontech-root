<?php

namespace Lexontech\Root\app\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Lexontech\Root\app\Infrastructures\Media;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if($request->has('filepond'))
        {
            $image     = $request->file('filepond');
            $folder    = Media::SaveFile($image,'/filepond/');
            Session::put('filepond', $folder);
            return $folder;
        }
        if($request->has('image'))
        {
            $image     = $request->file('image');
            $folder    = Media::SaveFile($image,'/filepond/');
            Session::put('image', $folder);
            return $folder;
        }
        if($request->has('imageBackground'))
        {
            $image     = $request->file('imageBackground');
            $folder    = Media::SaveFile($image,'/filepond/');
            Session::put('imageBackground', $folder);
            return $folder;
        }
        return '';
    }
    public function destroy(Request $request)
    {
//        $folder = $request->getContent();
//        $folder = explode('<link', $folder)[0];
        Media::DeleteFile(\session('filepond'));
        \session()->forget('filepond');
    }
}
