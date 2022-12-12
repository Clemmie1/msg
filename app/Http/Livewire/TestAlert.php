<?php

namespace App\Http\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class TestAlert extends Component
{

    use LivewireAlert;
    public $signinEmailS;

    public function render()
    {
        return view('livewire.test-alert');
    }

    public function submitAuthLoginS(){
        $email = $this->signinEmailS;
        return $this->alert('success', 'Basic Alert');
    }

}
