<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AuthLoginController extends Controller
{

    use LivewireAlert;

    public function AuthLogin(Request $request){

        $email = $request->input('signin-email');
        $password = $request->input('signin-password');
        date_default_timezone_set("Europe/Moscow");
        $date = date('d.m.Y H:i');
        $UserInfo = DB::table('users')->where('email', $email)->first();

        if ($UserInfo != null){

            if ($UserInfo->password == $password){

                $tokenSession = bin2hex(random_bytes(50));
                DB::insert("insert into user_session (session_token, username, email, ip, countory, time) values ('$tokenSession', '$UserInfo->username', '$email', NULL, NULL, '$date')");
                session()->put('tokenSession', $tokenSession);
                return redirect('/');

            } else {
                notify()->warning('Пароль неверный', '');
                return redirect('/login');
            }

        } else {
            notify()->error('Имя пользователя не найдено', '');
            return redirect('/login');
        }

    }

    public function AuthResetPass(Request $request){
        $email = $request->input('resetpassword-email');

        $UserInfo = DB::table('users')->where('email', $email)->first();

        if ($UserInfo != null){
            $token = bin2hex(random_bytes(55));
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%";
            $newPass = substr(str_shuffle($chars),0,10);
            DB::insert("insert into resetpassword (email, token, new_pass) values ('$email', '$token', '$newPass')");
            Mail::to($email)->send(new \App\Mail\SendResetPassAccountMail($token));
            notify()->success('Ссылка отправлена для сброса пароля на почту', '');
        } else {
            notify()->error('Пользователя не найдено', '');

        }
        return redirect('/reset');
    }

    public function ResetKey($ResetKey){

        $token = $ResetKey;

        $UserInfo = DB::table('resetpassword')->where('token', $token)->first();

        if ($UserInfo != null){

            DB::update('update users set password="'.$UserInfo->new_pass.'" where email = "'.$UserInfo->email.'"');

            Mail::to($UserInfo->email)->send(new \App\Mail\SendNewResetPassAccountMail($UserInfo->new_pass));
            DB::table('resetpassword')->where('token', $token)->delete();
            //notify()->success('Новый пароль был отправлен на почту', '');
             return $this->alert('success', 'Новый пароль был отправлен на почту');

        }
        return redirect('/login');

    }



}
