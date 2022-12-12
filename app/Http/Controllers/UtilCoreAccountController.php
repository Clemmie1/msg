<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtilCoreAccountController extends Controller
{
    public static function setTokenSessionToUsername($tokenSession){
        $UserInfo = DB::table('user_session')->where('session_token', $tokenSession)->first();
        return $UserInfo->username;
    }
}
