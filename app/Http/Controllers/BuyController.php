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
        $summary->price = 8000;
        $summary->total = $request->qty * $summary->price;
        $order = $this->toOrder($summary);
        dd($order);
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

    private function toOrder($input): Order
    {
        $order = new Order();
        $order->user_id = 1;
        $order->invoice = true;
        $order->effective_date = null;
        $order->total_price = $input->total;
        $details = [];
        foreach ($input->details as $type => $detail) {
            $details[] = $this->toOrderDetail($type, $detail);
        }
        $order->details = $details;
        return $order;
    }

    private function toOrderDetail($type, $detail): OrderDetail
    {
        $orderDetails = new OrderDetail();
        $orderDetails->order_id = null;
        $orderDetails->flavor_id = 1;
        $orderDetails->qty = $detail['qty'];
        $orderDetails->unit_price = $detail['subtotal']/$detail['qty'];
        return $orderDetails;
    }
}
