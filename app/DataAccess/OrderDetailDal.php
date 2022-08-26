<?php

namespace App\DataAccess;

use App\Models\OrderDetail;

class OrderDal
{
    public function fromForm($type, $detail): OrderDetail
    {
        $details = new OrderDetail();
        $details->order_id = null;
        $details->flavor_id = 1;
        $details->qty = $detail['qty'];
        $details->unit_price = 0;
        $details->subtotal = 0;
        if (array_key_exists('unit_price', $detail)) {
            $details->subtotal = $detail['qty']*$detail['unit_price'];
            $details->unit_price = $detail['unit_price'];
        }
        else if (array_key_exists('subtotal', $detail)) {
            $details->unit_price = $detail['subtotal']/$detail['qty'];
            $details->subtotal = $detail['subtotal'];
        }
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
