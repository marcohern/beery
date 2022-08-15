<?php

namespace Database\Seeders\Helpers;

use Illuminate\Support\Facades\Hash;

class PasswordSeederHelper
{
    public static function hashPassword(array &$array)
    {
        foreach($array as $k => $record) {
            $array[$k]['password'] =  Hash::make($record['password']);
        }
    }
}
