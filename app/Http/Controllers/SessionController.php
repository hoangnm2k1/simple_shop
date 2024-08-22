<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function getSession(Request $request) {
        // $val = Session::get('_token');
    }

    public function setSession() {
        Session::put('userName', 'John');
    }
}
