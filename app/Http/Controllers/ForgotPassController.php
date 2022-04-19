<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPassController extends Controller
{
    public function index() {
        return view('forgot password.forgot-password');
    }
}
