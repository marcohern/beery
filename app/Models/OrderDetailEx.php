<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailEx extends Model
{
    use HasFactory;
    protected $table = 'beery_order_details_ex';

    public function order()
    {
        return $this->belongsTo(OrderEx::class);
    }

    public function flavor()
    {
        return $this->belongsTo(Flavor::class);
    }
}
