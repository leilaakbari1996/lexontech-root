<?php

namespace Lexontech\Root\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Lexontech\Root\app\Http\Requests\Menus\StoreRequest;
use Lexontech\Root\app\Infrastructures\Media;
use Lexontech\Root\app\Models\Menu;
use Lexontech\Root\app\Models\RootSidebar;
use Lexontech\Root\app\Models\Setting;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->page;
        if(is_null($page)) $page = 1;
        $menusMain         = Menu::GetMenus([]);
        return view('RootView::menus.index',compact('page','menusMain'));
    }

    public function create()
    {
        $select                 = ['id','Title'];
        $filter['parent_id']    = null;
        $parents              = Menu::GetMenus(filters:$filter,selected: $select);
        return view('RootView::menus.create',compact('parents'));
    }

    public function edit($id)
    {
        $menuMain                       = Menu::findOrFail($id);
        $select                         = ['id','Title','parent_id'];
        $filter['parent_id']            = null;
        $filter['not_id'][]      = $id;
        if(!is_null($menuMain->parent_id))
        {
            $filter['not_id'][]  = $menuMain->parent_id;
        }
        $parents                      = Menu::GetMenus(filters:$filter,selected: $select);
        return view('RootView::menus.edit',compact('parents','menuMain'));
    }

    public function store(StoreRequest $request)
    {
        $validatedData  = $request->validated();
        if(!is_null(session('filepond')))
        {
            $result                            = Media::SaveFileInUploadsFolder(session('filepond'));
            if (!$result['Status'])
            {
                $data['message'] = 'تصویر منو را مجددا وارد کنید!!';
                return \ReturnMessage::failResponse($request,'تصویر منو را وارد کنید!!',$data);
            }
            $validatedData['IconURL'] = $result['path'];
            session()->forget('filepond');
        }


        $menu = Menu::create($validatedData);
        $data['message'] = 'منو با موفقیت ایجاد شد.';
        return \ReturnMessage::successResponse($request,'منو با موفقیت ایجاد شد.',$data);
    }

    public function update(StoreRequest $request,$id)
    {
        $menu                         = Menu::find($id);
        if(is_null($menu))
        {
            $data['message']          = 'منو مورد نظر یافت نشد.';
            return \ReturnMessage::failResponse($request,'منو مورد نظر یافت نشد.',$data);
        }
        $validatedData                = $request->validated();
        $image                        = null;

        if(!is_null(session('filepond')))
        {
            $result                            = Media::SaveFileInUploadsFolder(session('filepond'));
            if (!$result['Status'])
            {
                $data['message'] = 'تصویر منو را مجددا وارد کنید!!';
                return \ReturnMessage::failResponse($request,'تصویر منو را وارد کنید!!',$data);
            }
            $validatedData['IconURL'] = $result['path'];
            session()->forget('filepond');
            $image                    = $menu->IconURL;
        }

        $menu->update($validatedData);

        if(!is_null($image)) Media::DeleteFile($image);

        $data['message'] = 'منو با موفقیت ویرایش شد.';
        return \ReturnMessage::successResponse($request,'منو با موفقیت ویرایش شد.',$data);
    }

    public function destroy(Request $request,$id)
    {
        $menu                = Menu::find($id);
        if(is_null($menu))
        {
            $data['message'] = 'منو مورد نظر یافت نشد.';
            return \ReturnMessage::failResponse($request,'منو مورد نظر یافت نشد.',$data);
        }

        $image  = $menu->LogoURL;

        $menu->delete();
        Media::DeleteFile($image);
        $data['message'] = 'منو مورد نظر با موفقیت حذف شد!!';
        $data['url']     = 'menus';
        return \ReturnMessage::successResponse($request,'منو مورد نظر با موفقیت حذف شد!!',$data);
    }

    public function RequiredColumns(Request $request)
    {
        $requiredColumns = Menu::RequiredColumns;
        $data['columns'] = $requiredColumns;
        return \ReturnMessage::successResponse($request,'',$data);
    }
}
