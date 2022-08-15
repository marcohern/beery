<?php

namespace Database\Seeders;


use Database\Seeders\Helpers\DateSeederHelper;
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
            ['id'=>1,'flavor_id'=>1, 'price'=>8000, 'stock'=>100 ],
            ['id'=>2,'flavor_id'=>2, 'price'=>8000, 'stock'=>100 ],
            ['id'=>3,'flavor_id'=>3, 'price'=>8000, 'stock'=>100 ],
        ];
        DateSeederHelper::setTimestamps($data);
        DB::table('beery')->insert($data);
    }
}
