<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginform() {
        return view('forty.pages.login');
    }

    public function login(Request $request) {
        $input = $request->all();
        dd($input);
    }
}
