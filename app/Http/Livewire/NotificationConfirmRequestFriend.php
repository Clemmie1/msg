<?php

namespace App\Http\Livewire;

use App\Http\Controllers\AccountCoreInfoController;
use App\Http\Controllers\UtilCoreAccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class NotificationConfirmRequestFriend extends Component
{
    use LivewireAlert;
    public $ids;

    public function render()
    {
        return view('livewire.notification-confirm-requst-friend');
    }

    public function submitConfirmFriendRequest($sender_id){

        date_default_timezone_set("Europe/Moscow");
        $date = date('d.m.Y');
        $date_time = date('H:i');

        $user = UtilCoreAccountController::setTokenSessionToUsername(session()->get('tokenSession'));
        $getNameUser1 = AccountCoreInfoController::getAccountID($user);

        DB::table('users_notifications')->where('type', 'RequestFriend')->where('sender_id', $sender_id)->where('recived_id', $getNameUser1)->delete();
        DB::table('users_notifications')->where('type', 'RequestFriend')->where('sender_id', $getNameUser1)->where('recived_id', $sender_id)->delete();
        DB::table('friendrequest')->where('sender_id', $getNameUser1)->where('recived_id', $sender_id)->delete();
        DB::table('friendrequest')->where('sender_id', $sender_id)->where('recived_id', $getNameUser1)->delete();

        $getName1 = AccountCoreInfoController::getNameAccountID($sender_id);
        $getName2 = AccountCoreInfoController::getNameAccountID($getNameUser1);

        DB::insert("insert into user_friends (sender_name, recived_name, sender_id, recived_id, date) values ('$getName1', '$getName2', '$sender_id', '$getNameUser1', '$date')");

        //$userID = $this->idConfirmFriendRequest;
//
//        DB::insert("insert into user_friends (sender_name, recived_name, sender_id, recived_id, date) values ('RequestFriend', '$sender_id', '$recived_id', '$date', '$date_time')");

        $this->alert('success', 'Пользователь добавлен в друзья');
        return $this->redirect('/');
    }
}
