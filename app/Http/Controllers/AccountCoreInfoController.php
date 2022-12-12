<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountCoreInfoController extends Controller
{
    public static function getUserName($tokenSession){

        $UserInfo = DB::table('user_session')->where('session_token', $tokenSession)->first();
        $UserInfoCore = DB::table('users')->where('email', $UserInfo->email)->first();

        return $UserInfoCore->username;

    }

    public static function getAccountEmail($tokenSession){

        $UserInfo = DB::table('user_session')->where('session_token', $tokenSession)->first();
        $UserInfoCore = DB::table('users')->where('email', $UserInfo->email)->first();

        return $UserInfoCore->email;

    }

    public static function getAccountLocation($tokenSession){

        $UserInfo = DB::table('user_session')->where('session_token', $tokenSession)->first();
        $UserInfoCore = DB::table('users')->where('email', $UserInfo->email)->first();

        return $UserInfoCore->country;

    }

    public static function getAccountPhone($tokenSession){

        $UserInfo = DB::table('user_session')->where('session_token', $tokenSession)->first();
        $UserInfoCore = DB::table('users')->where('email', $UserInfo->email)->first();

        return $UserInfoCore->phone;

    }

    public static function getAccountPassword($user){

        $UserInfoCore = DB::table('users')->where('username', $user)->first();

        return $UserInfoCore->password;

    }

    public static function getAccountID($user){

        $UserInfoCore = DB::table('users')->where('username', $user)->first();

        return $UserInfoCore->id;

    }

    public static function getNameAccountID($userID){

        $UserInfoCore = DB::table('users')->where('id', $userID)->first();

        return $UserInfoCore->username;

    }

    public static function getAccountNotifications($userID){

        $UserInfoNotifications = DB::table('users_notifications')->where('recived_id', $userID)->first();

        return $UserInfoNotifications;

    }

    public function getFriendList($userID){

    }

}
