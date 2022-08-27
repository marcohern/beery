<?php

namespace App\DataAccess;

use App\Models\OrderEx;

class OrderExDal
{
    public function fromForm($input): OrderEx
    {
        $order = new OrderEx();
        $order->invoice = false;
        $order->effective_date = null;
        $order->total_price = $input->total;

        $order->name = $input->name;
        $order->phone = $input->phone;
        $order->email = $input->email;
        $order->comments = $input->comments;

        $order->suite = $input->suite;
        $order->address = $input->address;
        $order->zone = $input->zone;
        $order->zip = $input->zip;
        $order->city = $input->city;
        $order->country = $input->country;

        return $order;
    }

    public function makeEffective(OrderEx $order)
    {
        $order->effective_date = new \DateTime();
        $order->invoice = true;
    }

    public function saveAll(OrderEx $order, array $details)
    {
        $order->save();
        foreach($details as $detail) {
            $detail->order_id = $order->id;
            $detail->save();
        }
    }
}
