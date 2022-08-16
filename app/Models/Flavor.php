<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flavor extends Model
{
    use HasFactory;

    protected $table = 'beery_flavors';

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }
}
