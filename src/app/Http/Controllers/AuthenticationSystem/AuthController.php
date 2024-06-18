<?php

namespace Lexontech\Root\app\Http\Controllers\AuthenticationSystem;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Lexontech\Root\app\Models\AuthenticationSystem\User;
use Lexontech\Root\app\Http\Requests\AuthenticationSystem\LoginRequest;
use Lexontech\Root\app\Http\Requests\AuthenticationSystem\OtpRequest;
use Lexontech\Root\app\Traits\AuthenticationSystem\SMS;


class AuthController extends Controller
{
    use SMS;
    public function register(Request $request)
    {
        $url = url()->previous();
        return view('RootView::authenticationSystem.register',compact('url'));
    }

    public function SendSMS(LoginRequest $request)
    {
        $validatedData = $request->validated();
        $response = $this->SendOtp($validatedData['PhoneNumber']);
        $d = new Carbon($response['data']['dateOtp']);
        $d->timezone = 'Asia/Tehran';
        $response['data']['dateOtp'] = $d->format('H:i:s');
        if($response['status']) return \ReturnMessage::successResponse($request,$response['message'],$response['data']);
        return \ReturnMessage::failResponse($request,$response['message']);
    }

    public function login(OtpRequest $request)
    {
        $validatedData        = $request->validated();
        $result               = $this->VerifyOtp($validatedData);
        if($result['status'])
        {
            /**
             * @var User $user;
             */
            $user             = User::updateOrCreateByPhone($validatedData['PhoneNumber']);
//            $token            = $user->createToken('myToken')->plainTextToken;
//            $data['token']    = $token;
            session()->regenerate();
            Auth::guard()->login($user,1);
//            Auth::logoutOtherDevices('123456');
            $data['pageURL'] = Session::get('pageUrl');
            $data['url']     = '/panel';
            return \ReturnMessage::successResponse($request,$result['msg'],$data);
        }
        return \ReturnMessage::failResponse($request,$result['msg'],[]);
    }

    public function logout(Request $request)
    {
        session()->invalidate();
        session()->regenerateToken();
        Auth::guard()->logout();
//        auth('sanctum')->user()->tokens()->delete();
        return redirect('/');
    }
}
