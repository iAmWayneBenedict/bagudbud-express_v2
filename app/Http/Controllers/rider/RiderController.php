<?php

namespace App\Http\Controllers\rider;

use App\Http\Controllers\Controller;
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
