<?php

namespace App\Http\Controllers;

use App\Mail\Buy;
use App\Models\Flavor;
use App\DataAccess\OrderExDal;
use App\DataAccess\OrderDetailExDal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BuyController extends Controller
{
    protected $orderExDal;
    protected $orderDetailExDal;

    public function __construct(OrderExDal $orderExDal, OrderDetailExDal $orderDetailExDal)
    {
        $this->orderExDal = $orderExDal;
        $this->orderDetailExDal = $orderDetailExDal;
    }

    public function prsent()
    {
        return view('forty.pages.purchase_request_sent');
    }

    public function buyform()
    {
        $flavors = Flavor::all();
        return view('forty.pages.buy', [ 'flavors'=>$flavors ]);
    }

    public function buySummarySave(Request $request)
    {
        //get catalog of flavors and the form data
        $flavors = Flavor::all();
        $summary = (object)$request->all();

        //create flavor hash tables by id and code
        list($flavorsById, $flavorsByCode) = $this->orderDetailExDal->getFlavorHashTables($flavors);

        //Use the form data to create models (order and details)
        $order = $this->orderExDal->fromForm($summary);
        $details = $this->orderDetailExDal->listFromForm($flavorsByCode, $summary->details);
        $order->total_price = $this->orderDetailExDal->sumTotal($details);
        
        //Store those models in the session
        $session = $request->session();
        $session->put('order', $order);
        $session->put('details', $details);
        $session->put('flavors', $flavorsById);

        //rederect to summary page
        return redirect('/buy-summary');
    }

    public function buySummary(Request $request) {
        $session = $request->session();
        //check if there is an order to display
        if (!$session->has('order')) return redirect('/buy');

        //get each session object
        $order = $session->get('order');
        $details = $session->get('details');
        $flavors = $session->get('flavors');

        //display the order with details and flavors
        return view('forty.pages.buy-summary', [
            'order'=>$order,
            'details'=>$details,
            'flavors'=>$flavors
        ]);
    }

    public function buy(Request $request) {
        //Get order and details stored in session
        $session = $request->session();
        $order = $session->get('order');
        $details = $session->get('details');
        $flavors = $session->get('flavors');

        //set it to become an invoice (freeze it)
        $this->orderExDal->makeEffective($order);

        //save it all to the database
        DB::transaction(function() use ($order, $details) {
            $this->orderExDal->saveAll($order, $details);
        });

        //Send an email
        Mail::send(new Buy($order, $details, $flavors));
        
        //Delete the session
        $session->forget(['order','details','flavors']);

        //Rederect to a confirm purchase
        return redirect('/purchase-request-sent');
    }
}
