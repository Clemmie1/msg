<?php

use App\Http\Controllers\AccountCoreInfoUpdateController;
use App\Http\Controllers\AuthCoreController;
use App\Http\Controllers\AuthLoginController;
use App\Http\Controllers\AuthRegisterController;
use App\Http\Controllers\MyEvent;
use App\Http\Controllers\SelCoreChatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/test', function () {
    return view('test');
});
Route::post('/test/alert', [MyEvent::class, 'MyEvent']);


Route::get('/login', function () {
    return view('auth/login');
});

//Route::get('/confirm', function () {
//    return view('auth/confirm');
//});

//Route::get('/register', function () {
//    return view('auth/register');
//});

Route::get('/register', [AuthCoreController::class, 'AuthRegisterGet']);
Route::get('/', [AuthCoreController::class, 'AuthIndexGet']);
Route::get('/login', [AuthCoreController::class, 'AuthLoginGet']);
Route::get('/logout', [AuthCoreController::class, 'AuthLogoutGet']);
Route::get('/confirm', [AuthCoreController::class, 'AuthConfirmGet']);
Route::get('/reset', [AuthCoreController::class, 'AuthResetPass']);

Route::post('/oauth/register', [AuthRegisterController::class, 'AuthRegister']);
Route::post('/oauth/login', [AuthLoginController::class, 'AuthLogin']);
Route::post('/oauth/reset', [AuthLoginController::class, 'AuthResetPass']);
Route::get('/confirm/{ConfirmKey}', [AuthRegisterController::class, 'ConfirmKey']);
Route::get('/reset/{ResetKey}', [AuthLoginController::class, 'ResetKey']);

Route::get('/sel/{selID}', [SelCoreChatController::class, 'StartChatSel']);



Route::post('/api/updateAccount', [AccountCoreInfoUpdateController::class, 'AccountInfo']);
