<?php

namespace App\DataAccess;

use App\Models\Order;
use App\Models\OrderDetail;

class OrderDal
{
    public function fromForm($input): Order
    {
        $order = new Order();
        $order->user_id = 1;
        $order->invoice = false;
        $order->effective_date = null;
        $order->total_price = $input->total;
        return $order;
    }

    public function detailsFromForm($type, $detail): OrderDetail
    {
        $details = new OrderDetail();
        $details->order_id = null;
        $details->flavor_id = 1;
        $details->qty = $detail['qty'];
        $details->unit_price = $detail['subtotal']/$detail['qty'];
        return $details;
    }

    public function sumTotal(array $details)
    {
        $sum = 0;
        foreach ($details as $detail) {
            $sum += $detail->qty * $detail->unit_price;
        }
        return $sum;
    }
}
