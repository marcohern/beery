<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderEx extends Model
{
    use HasFactory;

    protected $table = 'beery_orders_ex';

    public function details() {
        return $this->hasMany(OrderDetailEx::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
