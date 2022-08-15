<?php

namespace Database\Seeders;

use Database\Seeders\Helpers\DateSeederHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id'=>1,'user_id'=>1, 'order_date'=>'2022-08-15 11:00:00', 'total_price'=>0],
        ];

        DateSeederHelper::setTimestamps($data);
        DB::table('beery_orders')->insert($data);
    }
}
