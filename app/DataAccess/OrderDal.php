<?php

namespace App\DataAccess;

use App\Models\Order;
use App\Models\OrderDetail;

class OrderDal
{
    public function fromForm($input, User $user): Order
    {
        $order = new Order();
        $order->user_id = $user->id;
        $order->invoice = false;
        $order->effective_date = null;
        $order->total_price = $input->total;
        return $order;
    }

    public function makeEffective(Order $order)
    {
        $order->effective_date = new \DateTime();
        $order->invoice = true;
    }
}
