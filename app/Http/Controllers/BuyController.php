<?php

namespace App\Http\Controllers;

use App\Models\Flavor;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class BuyController extends Controller
{

    public function prsent() {
        return view('forty.purchase_request_sent');
    }

    public function buyform() {
        $flavors = Flavor::all();
        return view('forty.buy', ['flavors'=>$flavors]);
    }

    public function buySummarySave(Request $request) {
        $summary = (object)$request->all();
        dd($summary);
        $summary->price = 8000;
        $summary->total = $request->qty * $summary->price;
        $request->session()->put('summary', $summary);
        return redirect('/buy-summary');
    }

    public function buySummary(Request $request) {
        if (!$request->session()->has('summary')) return redirect('/buy');
        $summary = $request->session()->get('summary');
        return view('forty.buy-summary', ['summary'=> $summary]);
    }

    public function buy(Request $request) {
        $summary = $request->session()->get('summary');
        Mail::send(new Buy($summary));
        $request->session()->forget('summary');
        return redirect('/purchase-request-sent');
    }
}
