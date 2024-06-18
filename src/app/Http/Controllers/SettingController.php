<?php

namespace Lexontech\Root\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Lexontech\Root\app\Http\Requests\Settings\UpdateRequest;
use Lexontech\Root\app\Infrastructures\Media;
use Lexontech\Root\app\Models\RootSidebar;
use Lexontech\Root\app\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $selected               = ['id','Key'];
        $settingsMain           = Setting::GetSettings(filters: [],selected: $selected);

        return view('RootView::settings.index',compact('settingsMain'));
    }

    public function edit($id)
    {
        $filter['id']           = $id;
        $setting                = Setting::GetSettings(filters: $filter)[0];
        return view('RootView::settings.edit',compact('setting'));
    }

    public function update(UpdateRequest $request,$id)
    {
        $filter['id']                     = $id;
        $setting                          = Setting::GetSettings(filters: $filter)[0];
        $value                            = $setting->Value;
        $validatedData                    = $request->validated();
        $validatedData['image']           = $value['image'] ?? null;
        $validatedData['imageBackground'] = $value['imageBackground'] ?? null;
        if (session()->has('image'))
        {
            $result                            = Media::SaveFileInUploadsFolder(session('image'));
            if (!$result['Status'])
            {
                $data['message'] = 'تصویر را مجددا وارد کنید!!';
                return \ReturnMessage::failResponse($request,'تصویر را وارد کنید!!',$data);
            }
            $validatedData['image'] = $result['path'];
            session()->forget('image');
        }

        if (session()->has('imageBackground'))
        {
            $result                            = Media::SaveFileInUploadsFolder(session('imageBackground'));
            if (!$result['Status'])
            {
                $data['message'] = 'تصویر را مجددا وارد کنید!!';
                return \ReturnMessage::failResponse($request,'تصویر را وارد کنید!!',$data);
            }
            $validatedData['imageBackground'] = $result['path'];
            session()->forget('imageBackground');
        }
        $setting->Value         = $validatedData;
        $setting->save();
        $data['message'] = 'تنظیمات با موفقیت ویرایش شد.';
        return \ReturnMessage::successResponse($request,'تنظیمات با موفقیت ویرایش شد.',$data);
    }
}
