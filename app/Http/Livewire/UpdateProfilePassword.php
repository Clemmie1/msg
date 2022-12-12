<?php

namespace App\Http\Livewire;

use App\Http\Controllers\AccountCoreInfoController;
use App\Http\Controllers\UtilCoreAccountController;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class UpdateProfilePassword extends Component
{

    use LivewireAlert;
    public $profilecurrentpassword;
    public $profilenewpassword;

    public function render()
    {
        return view('livewire.update-profile-password');
    }

    public function UpdateProfilePassword(){

        $profilecurrentpassword = $this->profilecurrentpassword;
        $profilenewpassword = $this->profilenewpassword;

        $user = UtilCoreAccountController::setTokenSessionToUsername(session()->get('tokenSession'));

        if($profilecurrentpassword == AccountCoreInfoController::getAccountPassword($user)){
            DB::update('update users set password="'.$profilenewpassword.'" where username = "'.$user.'"');
            return $this->alert('success', 'Пароль изменен');
        } else {
            return $this->alert('error', 'Старый пароль неверный');
        }

        //return $this->alert('success', AccountCoreInfoController::getAccountPassword($user));

    }

}
