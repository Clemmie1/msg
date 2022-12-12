<?php

namespace App\Http\Livewire;

use App\Http\Controllers\UtilCoreAccountController;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class AccountProfileSettings extends Component
{

    use LivewireAlert;
    public $profilePhone;
    public $profileLocation;

    public function render()
    {
        return view('livewire.account-profile-settings');
    }

    public function UpdateProfileLocationAndPhone(){


        $user = UtilCoreAccountController::setTokenSessionToUsername(session()->get('tokenSession'));
        $location = $this->profileLocation;
        $phone = $this->profilePhone;

        sleep(1);
        if ($location != null){
            DB::update('update users set country="'.$location.'" where username = "'.$user.'"');
        } else {
            DB::update('update users set country=NULL where username = "'.$user.'"');
        }
        sleep(1);
        if ($phone != null){
            DB::update('update users set phone="'.$phone.'" where username = "'.$user.'"');
        } else {
            DB::update('update users set phone=NULL where username = "'.$user.'"');
        }

        return $this->alert('success', 'Сохранено');

    }

}
