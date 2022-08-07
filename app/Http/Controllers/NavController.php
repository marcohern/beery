<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavController extends Controller
{
    public function home() {
        return view('forty.home');
    }
    public function landing() {
        return view('forty.landing');
    }
    public function generic() {
        return view('forty.generic');
    }
    public function elements() {
        return view('forty.elements');
    }

    public function contact(Request $request) {
        return view('forty.contact_request_sent');
    }
}
