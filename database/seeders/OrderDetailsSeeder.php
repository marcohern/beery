<?php

namespace Database\Seeders;

use Database\Seeders\Helpers\DateSeederHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id'=>1,'flavor_id'=>1, 'order_id'=>1, 'qty'=>1, 'unit_price'=>8000],
            ['id'=>2,'flavor_id'=>2, 'order_id'=>1, 'qty'=>2, 'unit_price'=>8000],
            ['id'=>3,'flavor_id'=>3, 'order_id'=>1, 'qty'=>3, 'unit_price'=>8000],

            ['id'=>4,'flavor_id'=>1, 'order_id'=>2, 'qty'=>2, 'unit_price'=>8000],
            ['id'=>5,'flavor_id'=>2, 'order_id'=>2, 'qty'=>2, 'unit_price'=>8000],
            ['id'=>6,'flavor_id'=>3, 'order_id'=>2, 'qty'=>2, 'unit_price'=>8000],

            ['id'=>7,'flavor_id'=>1, 'order_id'=>3, 'qty'=> 5, 'unit_price'=>8000],
            ['id'=>8,'flavor_id'=>2, 'order_id'=>3, 'qty'=>10, 'unit_price'=>8000],
            ['id'=>9,'flavor_id'=>3, 'order_id'=>3, 'qty'=>15, 'unit_price'=>8000],
        ];
        DateSeederHelper::setTimestamps($data);
        DB::table('beery_order_details')->insert($data);
        
        $orders = DB::table('beery_order_details')
            ->selectRaw('SUM(unit_price * qty) AS price, order_id')
            ->groupBy('order_id')->get();
        foreach($orders as $order) {
            DB::table('beery_orders')->where('id', $order->order_id)->update(['total_price'=> $order->price]);
        }
    }
}
