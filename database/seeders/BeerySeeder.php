<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id'=>1,'flavor_id'=>1 , 'price'=>8000 ],
            ['id'=>2,'flavor_id'=>2 , 'price'=>8000 ],
            ['id'=>3,'flavor_id'=>3 , 'price'=>8000 ],
        ];
        DateSeederHelper::setTimestamps($data);
        DB::table('beery')->insert($data);
    }
}
