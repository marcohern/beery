<?php 

namespace App\Interpreters;

use App\Models\OrderEx;
use Illuminate\Database\Eloquent\Model;

class OrderExInterpreter implements IInterpreter
{
    public function fromForm($input): Model
    {
        $order = new OrderEx();
        $order->invoice = false;
        $order->effective_date = null;
        $order->total_price = $input->total;

        $order->name = $input->name;
        $order->phone = $input->phone;
        $order->email = $input->email;
        $order->comments = $input->comments;

        $order->address1 = $input->address1;
        $order->address2 = $input->address2;
        $order->zone = $input->zone;
        $order->zip = $input->zip;
        $order->city = $input->city;
        $order->state = $input->state;
        $order->country = $input->country;

        return $order;
    }
}
