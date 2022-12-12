<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyEvent extends Controller
{
    public function MyEvent(Request $request){
        $msg = $request->input('message');
        broadcast(NEW \App\Events\MyEvent($msg));
        return 'ss';
    }
}
