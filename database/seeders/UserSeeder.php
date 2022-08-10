<?php

namespace Database\Seeders;

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
            ['id'=>1,'name'=>'Brad Pitt','email'=>'bpitt@mail.com', 'password'=>'bpitt' ]
        ];
        DateSeederHelper::setTimestamps($data);
        PasswordSeederHelper::hashPassword($data);
        DB::table('users')->insert($data);
    }
}
