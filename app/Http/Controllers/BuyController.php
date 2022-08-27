<?php

namespace App\Http\Controllers;

use App\Mail\Buy;
use App\Models\Flavor;
use App\Models\OrderEx;
use App\Models\OrderDetailEx;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BuyController extends Controller
{

    public function prsent() {
        return view('forty.pages.purchase_request_sent');
    }

    public function buyform() {
        $flavors = Flavor::all();
        return view('forty.pages.buy', [ 'flavors'=>$flavors ]);
    }

    public function buySummarySave(Request $request) {
        $summary = (object)$request->all();
        $order = $this->toOrder($summary);
        $flavorModels = Flavor::all();
        $flavors = [];
        $flavorsByCode = [];
        foreach ($flavorModels as $flavor) {
            $flavors[$flavor->id] = $flavor;
            $flavorsByCode[$flavor->code] = $flavor;
        }
        $details = [];
        foreach ($summary->details as $type => $detail) {
            $flavor = $flavorsByCode[$type];
            $details[] = $this->toOrderDetail($detail, $flavor);
        }
        $sum = 0;
        foreach ($details as $detail) {
            $sum += $detail->subtotal;
        }
        $order->total_price = $sum;
        $request->session()->put('order', $order);
        $request->session()->put('details', $details);
        $request->session()->put('flavors', $flavors);
        return redirect('/buy-summary');
    }

    public function buySummary(Request $request) {
        if (!$request->session()->has('order')) return redirect('/buy');
        $order = $request->session()->get('order');
        $details = $request->session()->get('details');
        $flavors = $request->session()->get('flavors');
        return view('forty.pages.buy-summary', [ 'order'=>$order, 'details'=>$details, 'flavors'=>$flavors ]);
    }

    public function buy(Request $request) {
        $order = $request->session()->get('order');
        $details = $request->session()->get('details');
        $flavors = $request->session()->get('flavors');

        Mail::send(new Buy($order, $details, $flavors));
        
        $request->session()->forget('order');
        $request->session()->forget('details');
        $request->session()->forget('flavors');

        return redirect('/purchase-request-sent');
    }

    private function toOrder($input): OrderEx
    {
        $order = new OrderEx();
        $order->invoice = true;
        $order->effective_date = null;
        $order->total_price = $input->total;
        
        $order->name = $input->name;
        $order->phone = $input->phone;
        $order->email = $input->email;
        $order->comments = $input->comments;
        return $order;
    }

    private function toOrderDetail($detail, &$flavor): OrderDetailEx
    {
        $orderDetail = new OrderDetailEx();
        $orderDetail->order_id = null;
        $orderDetail->flavor_id = $flavor->id;
        $qty_price = explode(":",$detail['qty']);
        $orderDetail->qty = 0+$qty_price[0];
        $orderDetail->subtotal = 0+$qty_price[1];
        $orderDetail->unit_price = $orderDetail->subtotal/$orderDetail->qty;
        return $orderDetail;
    }
}
