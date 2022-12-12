<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AuthRegisterController extends Controller
{
    public function AuthRegister(Request $request){

        $username = $request->input('signup-name');
        $email = $request->input('signup-email');
        $password = $request->input('signup-password');

        date_default_timezone_set("Europe/Moscow");
        $date = date('d.m.Y H:i');

        if ($username != null & $email != null & $password != null){

            if(preg_match('/^[a-zA-Z]{5,}$/', $username)) {

                $UserInfo = DB::table('users')->where('email', $email)->first();

                if ($UserInfo == null){

                    $token = bin2hex(random_bytes(60));
                    $tokenSession = bin2hex(random_bytes(50));

                    DB::insert("insert into users (username, password, email, valid_email, created, status, country, phone) values ('$username', '$password', '$email', '0', '$date', NULL, NULL, NULL)");
                    DB::insert("insert into confirmation_mail (email, token) values ('$email', '$token')");


                    DB::insert("insert into user_session (session_token, username, email, ip, countory, time) values ('$tokenSession', '$username', '$email', NULL, NULL, '$date')");
                    $link = "http://devmessenger.kz/confirm/".$token;
                    Mail::to($email)->send(new \App\Mail\SendConfirmAccountMail($link));

                    session()->put('tokenSession', $tokenSession);

                    notify()->success('Проверьте вашу почту', '');
                    return redirect('/confirm');
                } else {
                    notify()->warning('Пользователь с такой почтой уже зарегистрирован', '');
                    return redirect('/register');
                }

            } else {
                notify()->warning('Введите нормальный имя пользователя', '');
                return redirect('/register');
            }

        } else {
            notify()->error('Введите данные для регистрации', '');
            return redirect('/register');
        }


    }

    public function ConfirmKey($ConfirmKey)
    {
        $token = $ConfirmKey;

        $UserInfo = DB::table('confirmation_mail')->where('token', $token)->first();

        if ($UserInfo != null){

            $accountEmail = $UserInfo->email;
            DB::update('update users set valid_email="1" where email = "'.$accountEmail.'"');
            DB::table('confirmation_mail')->where('token', $token)->delete();
            return redirect('/');

        } else {
            abort(404, 'Page not found');
            //return ["confirmation_mail" => "Verification key not found"];
        }

    }

}
