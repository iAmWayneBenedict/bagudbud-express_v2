<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiderController extends Controller
{
    public function riderLogin() {
        return view('rider.rider-login');
    }

    public function riderSignup() {
        return view('rider.rider-signup');
    }
}
