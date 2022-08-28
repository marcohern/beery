<?php

namespace App\DataAccess;

use App\Models\OrderDetailEx;

class OrderDetailExDal
{
    public function fromForm($flavor, $detail): OrderDetailEx
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

    public function listFromForm(array $flavorsByCode, $details): array
    {
        $results = [];
        foreach ($details as $type => $detail) {
            $flavor = $flavorsByCode[$type];
            $results[] = $this->fromForm($flavor, $detail);
        }
        return $results;
    }

    public function sumTotal(array $details)
    {
        $sum = 0;
        foreach ($details as $detail) {
            $sum += $detail->qty * $detail->unit_price;
        }
        return $sum;
    }

    public function getFlavorHashTables($flavors)
    {
        $flavorsById = [];
        $flavorsByCode = [];
        foreach ($flavors as $flavor) {
            $flavors[$flavor->id] = $flavor;
            $flavorsByCode[$flavor->code] = $flavor;
        }
        return [$flavors, $flavorsByCode];
    }

    public function detailsToComment($details, $flavorsById) {
        $comments = 'Details:';
        foreach ($details as $detail) {
            $flavor = $flavorsById[$detail->flavor_id];
            $comments .= " + {$flavor->name}x{$detail->qty}={$detail->subtotal}";
        }
        return $comments;
    }
}
