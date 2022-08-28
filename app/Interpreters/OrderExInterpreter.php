<?php 

namespace App\DataAccess;

use Illuminate\Database\Eloquent\Model;

class OrderExInterpreter implements IInterpreter
{
    public function fromForm(Collection $input): Model
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
