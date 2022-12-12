<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class AuthResetPassword extends Component
{

    use LivewireAlert;
    public $resetpasswordemail;

    public function render()
    {
        return view('livewire.auth-reset-password');
    }

    public function submitAuthResetPassword(){

        $email = $this->resetpasswordemail;

        $UserInfo = DB::table('users')->where('email', $email)->first();

        if ($UserInfo != null){
            $token = bin2hex(random_bytes(55));
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%";
            $newPass = substr(str_shuffle($chars),0,10);
            DB::insert("insert into resetpassword (email, token, new_pass) values ('$email', '$token', '$newPass')");
            Mail::to($email)->send(new \App\Mail\SendResetPassAccountMail($token));
            //return notify()->success('Ссылка отправлена для сброса пароля на почту', '');
            return $this->alert('success', 'Ссылка отправлена для сброса пароля на почту');
        } else {
            //return notify()->error('Пользователя не найдено', '');
            return $this->alert('error', 'Пользователя не найдено');

        }

    }

}
