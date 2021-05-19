<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientAuthentication extends Controller
{
    //

    public function logout()
    {
        session()->forget('LoggedClient');
        return redirect('client/login');
    }
}