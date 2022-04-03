<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function clientSignup() {
        return view('client.client-signup');
    }

    public function clientLogin() {
        return view('client.client-login');
    }
}
