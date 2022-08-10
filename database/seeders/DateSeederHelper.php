<?php

namespace Database\Seeders;

use Carbon\Carbon;


class DateSeederHelper
{
    public static function setTimestamps(array &$array)
    {
        $now = Carbon::now();
        foreach($array as $k => $record) {
            $array[$k]['created_at'] = $now;
            $array[$k]['updated_at'] = null;
        }
    }
}
