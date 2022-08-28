<?php

namespace Database\Seeders;

use Database\Seeders\Helpers\DateSeederHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeeryFlavorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id'=>1,'code'=>'pale' , 'name'=>'Pale' ],
            ['id'=>2,'code'=>'rusty', 'name'=>'Rusty'],
            ['id'=>3,'code'=>'dark' , 'name'=>'Dark' ]
        ];
        DateSeederHelper::setTimestamps($data);
        DB::table('flavors')->insert($data);
    }
}
