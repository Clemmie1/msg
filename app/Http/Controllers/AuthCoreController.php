<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthCoreController extends Controller
{
    public function AuthIndexGet(){

        if (session()->get('tokenSession') != NULL){
            $UserInfo = DB::table('user_session')->where('session_token', session()->get('tokenSession'))->first();
            $accountEmail = $UserInfo->email;
            $User = DB::table('users')->where('email', $accountEmail)->first();
            if ($User->valid_email == 0){
                return redirect('/confirm');
            } else {
                return view('index/ImIndex');
            }

        } else {
            return redirect('/login');
        }
    }

    public function AuthRegisterGet(){
        return view('auth/register');
    }

    public function AuthLoginGet(){
        if (session()->get('tokenSession') != NULL){
            $UserInfo = DB::table('user_session')->where('session_token', session()->get('tokenSession'))->first();
            $accountEmail = $UserInfo->email;
            $User = DB::table('users')->where('email', $accountEmail)->first();
            if ($User->valid_email == 0){
                return redirect('/confirm');
            } else {
                return redirect('/');
            }
        } else {
            return view('auth/login');
        }
    }


    public function AuthLogoutGet(){
        if (session()->get('tokenSession') != NULL){
            DB::table('user_session')->where('session_token', session()->get('tokenSession'))->delete();
            session()->forget(['tokenSession']);
            return redirect('/login');
        }
        return view('auth/login');
    }

    public function AuthConfirmGet(){
        if (session()->get('tokenSession') != NULL){
            $UserInfo = DB::table('user_session')->where('session_token', session()->get('tokenSession'))->first();
            $accountEmail = $UserInfo->email;
            $User = DB::table('users')->where('email', $accountEmail)->first();
            if ($User->valid_email == 0){
                return view('auth/confirm');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/login');
        }
    }

    public function AuthResetPass(){
        if (session()->get('tokenSession') == NULL){
            return view('auth/resetpass');
        } else {
            return redirect('/');
        }

    }

}
