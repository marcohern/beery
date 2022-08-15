<?php

namespace Database\Seeders;

use Database\Seeders\Helpers\DateSeederHelper;
use Database\Seeders\Helpers\PasswordSeederHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id'=>1,'name'=>'Brad Pitt'   ,'email'=>'bpitt@mail.com'  , 'password'=>'bpitt'   ],
            ['id'=>2,'name'=>'Tom Cruise'  ,'email'=>'tcruise@mail.com', 'password'=>'tcruise' ],
            ['id'=>3,'name'=>'Frank Castle','email'=>'fcastle@mail.com', 'password'=>'fcastle' ]
        ];
        DateSeederHelper::setTimestamps($data);
        PasswordSeederHelper::hashPassword($data);
        DB::table('users')->insert($data);
    }
}
