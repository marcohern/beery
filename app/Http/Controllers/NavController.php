<?php

namespace App\Http\Controllers;


use App\Mail\Buy;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NavController extends Controller
{
    public function home() {
        return view('forty.pages.home');
    }
    public function landing() {
        return view('forty.pages.landing');
    }
    public function generic() {
        return view('forty.pages.generic');
    }
    public function elements() {
        return view('forty.pages.elements');
    }

    public function contact(Request $request) {
        $contact = $request->all();
        Mail::send(new Contact($contact));
        return redirect('/contact-email-sent');
    }

    public function sent() {
        return view('forty.pages.contact_request_sent');
    }
}
