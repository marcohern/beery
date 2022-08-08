<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyRequest extends Model
{
    use HasFactory;
    
    protected $fillable = ['_token'];

    public $flavor;
    public $qty;
    public $name;
    public $email;
    public $comments;
    public $_token;
}
