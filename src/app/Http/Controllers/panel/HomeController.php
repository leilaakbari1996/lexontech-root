<?php

namespace Lexontech\Root\app\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Lexontech\Root\app\Models\RootSidebar;
use Lexontech\Root\app\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        return view('RootView::panel.index');
    }
}
