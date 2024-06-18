<?php

use Illuminate\Support\Facades\Route;
use Lexontech\Root\app\Http\Controllers\UploadController;
use Lexontech\Root\app\Http\Controllers\ServiceController;
use Lexontech\Root\app\Http\Controllers\MenuController;
use Lexontech\Root\app\Http\Controllers\SettingController;

use \Lexontech\Root\app\Http\Controllers\UserController;
use Lexontech\Root\app\Http\Controllers\panel\HomeController as PanelHomeController;


Route::middleware('guest')->group(function () {
    Route::get('login', 'Lexontech\Root\app\Http\Controllers\AuthenticationSystem\AuthController@register')->name('login');
    Route::post('send-sms', 'Lexontech\Root\app\Http\Controllers\AuthenticationSystem\AuthController@sendSMS');
    Route::post('login', 'Lexontech\Root\app\Http\Controllers\AuthenticationSystem\AuthController@login');

});

Route::middleware('auth')->group(function () {
    Route::get('/logout', 'Lexontech\Root\app\Http\Controllers\AuthenticationSystem\AuthController@logout');
});

Route::prefix('panel')->middleware('auth')->name('panel.')->group(function () {

    Route::get('/', [PanelHomeController::class,'index'])->middleware('auth');
    Route::resource('users', UserController::class)->middleware('admin');

    Route::post('/users/required-columns', [UserController::class, 'requiredColumns']);

});


Route::post('/file-pond-upload',[UploadController::class,'store'])->middleware('auth');
Route::delete('/file-pond-delete',[UploadController::class,'destroy'])->middleware('auth');


Route::prefix('panel')->name('panel.')->middleware('auth')->group(function (){

    Route::resource('services',ServiceController::class);
    Route::post('/services/required-columns',[ServiceController::class,'requiredColumns']);

    Route::resource('menus',MenuController::class);
    Route::post('/menus/required-columns',[MenuController::class,'requiredColumns']);

    Route::resource('settings',SettingController::class);

});
