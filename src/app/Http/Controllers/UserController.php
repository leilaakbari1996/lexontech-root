<?php

namespace Lexontech\Root\app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Lexontech\Root\app\Http\Requests\User\StoreRequest;
use Lexontech\Root\app\Http\Requests\User\UpdateRequest;
use Lexontech\Root\app\Models\AuthenticationSystem\User;
use Lexontech\Root\app\Infrastructures\Media;
use Lexontech\Root\app\Models\RootSidebar;

class UserController extends \App\Http\Controllers\Controller
{
    public function index(Request $request)
    {
        $page = $request->page;
        if(is_null($page)) $page = 1;
        $filters           = [];
        $select            = ['id','FullName','ProfileURL','Status','lex_PhoneNumber','Type'];
        $users             = User::GetUsersWithPagination($filters,$select,$page);
        return view('RootView::users.index',compact('users','page'));
    }

    public function destroy(Request $request,$user_id)
    {
        $user               = User::find($user_id);
        if(is_null($user))
        {
            $data['message'] = 'کاربر مورد نظر یافت نشد.';
            return \ReturnMessage::failResponse($request,'کاربر مورد نظر یافت نشد.',$data);
        }
        $image = $user->ProfileURL;
        $user->delete();
        if(!is_null($image)) Media::DeleteFile($image);
        $data['message'] = 'کاربر مورد نظر با موفقیت حذف شد!!';
        $data['url']     = 'users';
        return \ReturnMessage::successResponse($request,'کاربر مورد نظر با موفقیت حذف شد!!',$data);
    }

    public function edit($user_id)
    {
        $user               = User::findOrFail($user_id);
        return view('RootView::users.edit',compact(['user']));
    }

    public function update(UpdateRequest $request,$user_id)
    {
        $user = User::findOrFail($user_id);
        $validatedData = $request->validated();
        $filters['not_id'] = $user_id;
        $filters['PhoneNumber'] = $validatedData['lex_PhoneNumber'];
        $check = User::Check($filters);
        if ($check) {
            $data['message'] = 'شماره تلفن موجود می باشد.';
            return \ReturnMessage::failResponse($request, 'شماره تلفن موجود می باشد.', $data);
        }
        $image = null;

        if (!is_null(session('filepond')))
        {
            $result                            = Media::SaveFileInUploadsFolder(session('filepond'));
            if (!$result['Status'])
            {
                $data['message'] = 'تصویر کاربر را مجددا وارد کنید!!';
                return \ReturnMessage::failResponse($request,'تصویر کاربر را وارد کنید!!',$data);
            }
            $validatedData['ProfileURL']     = $result['path'];
            $image = $user->ProfileURL;
        }

        $user->update($validatedData);
        if (!is_null($image)) {
            Media::DeleteFile($image);
        }
        if (!is_null(session('filepond')))
        {
            session()->forget('filepond');
        }

        $data['message']            = 'کاربر با موفقیت ویرایش شد!!';
        return \ReturnMessage::successResponse($request,'کاربر با موفقیت ویرایش شد!!',$data);
    }

    public function create()
    {
        return view('RootView::users.create');
    }

    public function store(StoreRequest $request)
    {
        $validatedData             = $request->validated();
        $validatedData['password'] = Hash::make('11111111');
        if(!is_null(session('filepond')))
        {
            $result                            = Media::SaveFileInUploadsFolder(session('filepond'));
            if (!$result['Status'])
            {
                $data['message'] = 'تصویر کاربر را مجددا وارد کنید!!';
                return \ReturnMessage::failResponse($request,'تصویر کاربر را وارد کنید!!',$data);
            }
            $validatedData['ProfileURL']     = $result['path'];
        }

        User::create($validatedData);
        session()->forget('filepond');
        $data['message']           = 'کاربر با موفقیت ایجاد شد!!';
        return \ReturnMessage::successResponse($request,'کاربر با موفقیت ایجاد شد!!',$data);
    }

    public function RequiredColumns(Request $request)
    {
        $requiredColumns = User::RequiredColumns;
        $data['columns'] = $requiredColumns;
        return \ReturnMessage::successResponse($request,'',$data);
    }
}
