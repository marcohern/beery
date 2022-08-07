<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    use HasFactory;
    
    protected $fillable = ['_token'];

    public $name;
    public $email;
    public $message;
    public $_token;
}
