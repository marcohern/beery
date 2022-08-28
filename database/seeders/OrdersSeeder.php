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
            ['id'=>1,'user_id'=>1, 'effective_date'=>'2022-08-15 11:20:00'],
            ['id'=>2,'user_id'=>2, 'effective_date'=>'2021-10-15 13:45:00'],
            ['id'=>3,'user_id'=>3, 'effective_date'=>'2021-12-30 17:15:00'],
        ];

        DateSeederHelper::setTimestamps($data);
        DB::table('orders')->insert($data);
    }
}
