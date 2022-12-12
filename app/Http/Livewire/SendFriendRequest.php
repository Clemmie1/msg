<?php

namespace App\Http\Livewire;

use App\Http\Controllers\AccountCoreInfoController;
use App\Http\Controllers\UtilCoreAccountController;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class SendFriendRequest extends Component
{

    use LivewireAlert;
    public $SendFriendRequestUsername;

    public function render()
    {
        return view('livewire.send-friend-request');
    }


    public function submitSendFriendRequest(){

        date_default_timezone_set("Europe/Moscow");
        $date = date('d.m.Y');
        $date_time = date('H:i');

        $username = $this->SendFriendRequestUsername;

        $UserInfo = DB::table('users')->where('username', $username)->first();

        if ($UserInfo != null){
            $user = UtilCoreAccountController::setTokenSessionToUsername(session()->get('tokenSession'));
            if ($username != $user){

                $sender_id = AccountCoreInfoController::getAccountID($user);
                $recived_id = AccountCoreInfoController::getAccountID($username);
                $sender_name = $user;
                $recived_name = AccountCoreInfoController::getNameAccountID($recived_id);

                if (DB::table('friendrequest')->where('sender_id', $sender_id)->where('recived_id', $recived_id)->first() == null){
                    DB::insert("insert into users_notifications (type, sender_id, recived_id, date, date_time) values ('RequestFriend', '$sender_id', '$recived_id', '$date', '$date_time')");
                    DB::insert("insert into friendrequest (sender_name, recived_name, sender_id, recived_id, date, date_time) values ('$sender_name', '$recived_name', '$sender_id', '$recived_id', '$date', '$date_time')");
                    return $this->alert('success', 'Заявка отправлена');
                } else {
                    return $this->alert('warning', 'Вы уже отправили заявку этому пользователю');
                }

                return $this->alert('success', 'Заявка отправлена');
            } else {
                return $this->alert('warning', 'Невозможно отправить заявку самому себе');
            }

        } else {
            return $this->alert('error', 'Пользователь не найден');
        }

    }
}
