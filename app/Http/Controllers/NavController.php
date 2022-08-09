<?php

namespace App\Http\Controllers;


use App\Mail\Buy;
use App\Mail\Contact;
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
        return view('forty.contact_request_sent');
    }

    public function prsent() {
        return view('forty.purchase_request_sent');
    }

    public function buyform() {
        return view('forty.buy');
    }

    public function buySummarySave(Request $request) {
        $summary = (object)$request->all();
        $summary->price = 24000;
        $summary->total = $request->qty * $summary->price;
        $request->session()->put('summary', $summary);
        return redirect('/buy-summary');
    }

    public function buySummary(Request $request) {
        $summary = $request->session()->get('summary');
        return view('forty.buy-summary', ['summary'=> $summary]);
    }

    public function buy(Request $request) {
        $buyRequest = $request->all();
        Mail::send(new Buy($buyRequest));
        return redirect('/purchase-request-sent');
    }
}
