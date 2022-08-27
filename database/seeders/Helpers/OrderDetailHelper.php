<?php

namespace Database\Seeders\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class OrderDetailHelper
{
    public static function calculateSubtotals(array &$details) {
        foreach ($details as $k => $d) {
            $details[$k]['subtotal'] = $d['qty']*$d['unit_price'];
        }
    }
}
