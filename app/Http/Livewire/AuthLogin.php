<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class AuthLogin extends Component
{
    use LivewireAlert;
    public $signinEmail;
    public $signinPassword;

    public function render()
    {
        return view('livewire.auth-login');
    }

    public function submitAuthLogin(){

        $email = $this->signinEmail;
        $password = $this->signinPassword;
        date_default_timezone_set("Europe/Moscow");
        $date = date('d.m.Y H:i');
        sleep(1);
        $UserInfo = DB::table('users')->where('email', $email)->first();

        if ($UserInfo != null){

            sleep(2);
            if ($UserInfo->password == $password){
                $tokenSession = bin2hex(random_bytes(50));
                DB::insert("insert into user_session (session_token, username, email, ip, countory, time) values ('$tokenSession', '$UserInfo->username', '$email', NULL, NULL, '$date')");
                session()->put('tokenSession', $tokenSession);
                return redirect('/');

            } else {
                //notify()->warning('Пароль неверный', '');
                return $this->alert('warning', 'Пароль неверный');
                //return redirect('/login');
            }

        } else {
            //notify()->error('Имя пользователя не найдено', '');
            return $this->alert('error', 'Имя пользователя не найдено');
        }

    }
}
