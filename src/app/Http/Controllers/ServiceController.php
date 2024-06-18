<?php

namespace Lexontech\Root\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Lexontech\Root\app\Http\Requests\Services\StoreRequest;
use Lexontech\Root\app\Infrastructures\Media;
use Lexontech\Root\app\Models\RootSidebar;
use Lexontech\Root\app\Models\Service;
use Lexontech\Root\app\Models\Setting;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->page;
        if(is_null($page)) $page = 1;
        $services          = Service::GetServices([]);
        return view('RootView::services.index',compact('page','services'));
    }

    public function create()
    {

        return view('RootView::services.create');
    }

    public function edit($id)
    {
        $service                = Service::findOrFail($id);
        return view('RootView::services.edit',compact('service'));
    }

    public function store(StoreRequest $request)
    {
        $validatedData  = $request->validated();
        if(is_null(session('filepond')))
        {
            $data['message'] = 'لطفا تصویر لوگو را وارد کنید!!';
            return \ReturnMessage::failResponse($request,'لطفا تصویر لوگو را وارد کنید!!',$data);
        }
        $result                            = Media::SaveFileInUploadsFolder(session('filepond'));
        if (!$result['Status'])
        {
            $data['message'] = 'تصویر لوگو را مجددا وارد کنید!!';
            return \ReturnMessage::failResponse($request,'تصویر لوگو را وارد کنید!!',$data);
        }

        $validatedData['LogoURL'] = $result['path'];
        session()->forget('filepond');

        Service::create($validatedData);
        $data['message'] = 'سرویس با موفقیت ایجاد شد.';
        return \ReturnMessage::successResponse($request,'سرویس با موفقیت ایجاد شد.',$data);
    }

    public function update(StoreRequest $request,$id)
    {
        $service            = Service::find($id);
        if(is_null($service))
        {
            $data['message'] = 'سرویس مورد نظر یافت نشد.';
            return \ReturnMessage::failResponse($request,'سرویس مورد نظر یافت نشد.',$data);
        }
        $validatedData    = $request->validated();
        $image            = null;

        if(!is_null(session('filepond')))
        {
            $result                            = Media::SaveFileInUploadsFolder(session('filepond'));
            if (!$result['Status'])
            {
                $data['message'] = 'تصویر لوگو را مجددا وارد کنید!!';
                return \ReturnMessage::failResponse($request,'تصویر لوگو را وارد کنید!!',$data);
            }

            $validatedData['LogoURL'] = $result['path'];
            session()->forget('filepond');
            $image                    = $service->LogoURL;
        }

        $service->update($validatedData);

        if(!is_null($image)) Media::DeleteFile($image);

        $data['message'] = 'سرویس با موفقیت ویرایش شد.';
        return \ReturnMessage::successResponse($request,'سرویس با موفقیت ویرایش شد.',$data);
    }

    public function destroy(Request $request,$id)
    {
        $service                = Service::find($id);
        if(is_null($service))
        {
            $data['message'] = 'سرویس مورد نظر یافت نشد.';
            return \ReturnMessage::failResponse($request,'سرویس مورد نظر یافت نشد.',$data);
        }

        $image  = $service->LogoURL;

        $service->delete();
        Media::DeleteFile($image);
        $data['message'] = 'سرویس مورد نظر با موفقیت حذف شد!!';
        $data['url']     = 'services';
        return \ReturnMessage::successResponse($request,'سرویس مورد نظر با موفقیت حذف شد!!',$data);
    }

    public function RequiredColumns(Request $request)
    {
        $requiredColumns = Service::RequiredColumns;
        $data['columns'] = $requiredColumns;
        return \ReturnMessage::successResponse($request,'',$data);
    }
}
