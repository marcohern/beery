<?php

namespace Database\Seeders\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class OrderHelper
{
    public static function updateTotalsFromDetails() {
        $orders = DB::table('order_details')
            ->selectRaw('SUM(subtotal) AS price, order_id')
            ->groupBy('order_id')->get();
        foreach($orders as $order) {
            DB::table('orders')
                ->where('id', $order->order_id)
                ->update(['total_price'=> $order->price]);
        }
    }
}
