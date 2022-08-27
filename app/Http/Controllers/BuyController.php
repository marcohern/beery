<?php

namespace App\Http\Controllers;

use App\Mail\Buy;
use App\Models\Flavor;
use App\Models\OrderEx;
use App\Models\OrderDetailEx;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BuyController extends Controller
{

    public function prsent() {
        return view('forty.pages.purchase_request_sent');
    }

    public function buyform()
    {
        $flavors = Flavor::all();
        return view('forty.pages.buy', [ 'flavors'=>$flavors ]);
    }

    public function buySummarySave(Request $request)
    {
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
        $session = $request->session();
        $session->put('order', $order);
        $session->put('details', $details);
        $session->put('flavors', $flavors);
        return redirect('/buy-summary');
    }

    public function buySummary(Request $request) {
        $session = $request->session();
        if (!$session->has('order')) return redirect('/buy');
        $order = $session->get('order');
        $details = $session->get('details');
        $flavors = $session->get('flavors');
        return view('forty.pages.buy-summary', [ 'order'=>$order, 'details'=>$details, 'flavors'=>$flavors ]);
    }

    public function buy(Request $request) {
        $session = $request->session();
        $order = $session->get('order');
        $details = $session->get('details');
        $flavors = $session->get('flavors');

        DB::transaction(function() use ($order, $details) {
            $order->invoice = true;
            $order->effective_date = new \DateTime();
            $order->save();
            foreach($details as $detail) {
                $detail->order_id = $order->id;
                $detail->save();
            }
        });

        Mail::send(new Buy($order, $details, $flavors));
        
        $session->forget(['order','details','flavors']);

        return redirect('/purchase-request-sent');
    }

    private function toOrder($input): OrderEx
    {
        $order = new OrderEx();
        $order->invoice = false;
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
