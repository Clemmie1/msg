<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class AuthRegister extends Component
{

    use LivewireAlert;
    public $signupusername;
    public $signupemail;
    public $signuppassword;

    public function render()
    {
        return view('livewire.auth-register');
    }

    public function submitAuthRegister(){
        $username = $this->signupusername;
        $email = $this->signupemail;
        $password = $this->signuppassword;

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

                    return redirect('/confirm');
                } else {
                    //notify()->warning('Пользователь с такой почтой уже зарегистрирован', '');
                    return $this->alert('warning', 'Пользователь с такой почтой уже зарегистрирован');
                }

            } else {
                notify()->warning('Введите нормальный имя пользователя', '');
                return $this->alert('warning', 'Введите нормальный имя пользователя');
            }

        } else {
            //notify()->error('Введите данные для регистрации', '');
            return $this->alert('error', 'Введите данные для регистрации');
        }

    }
}
