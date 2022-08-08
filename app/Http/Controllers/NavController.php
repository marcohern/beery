<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $contact = $request->all();
        Mail::send(new Contact($contact));
        return redirect('/contact-email-sent');
    }

    public function sent() {
        return view('forty.contact-request-sent');
    }

    public function buyform() {
        return view('forty.buy');
    }

    public function buy() {
        return redirect('/thanks-for-your-interest');
    }
}
