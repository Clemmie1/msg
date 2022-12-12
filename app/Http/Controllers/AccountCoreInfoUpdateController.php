<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountCoreInfoUpdateController extends Controller
{
    public function AccountInfo(Request $request){

        $user = UtilCoreAccountController::setTokenSessionToUsername(session()->get('tokenSession'));
        $location = $request->input('profile-location');
        $phone = $request->input('profile-phone');

        if ($location != null){
            DB::update('update users set country="'.$location.'" where username = "'.$user.'"');
        } else {
            DB::update('update users set country=NULL where username = "'.$user.'"');
        }

        if ($phone != null){
            DB::update('update users set phone="'.$phone.'" where username = "'.$user.'"');
        } else {
            DB::update('update users set phone=NULL where username = "'.$user.'"');
        }


        return redirect('/');
    }
}
