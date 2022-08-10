<?php

namespace Database\Seeders;

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
        DB::table('beery_flavors')->insert([
            ['code'=>'pale' , 'name'=>'Pale' ],
            ['code'=>'rusty', 'name'=>'Rusty'],
            ['code'=>'dark' , 'name'=>'Dark' ]
        ]);
    }
}
