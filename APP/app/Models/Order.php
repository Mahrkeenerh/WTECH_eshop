<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id', 
        'user_id', 
        'shipping_type', 
        'shipping_price', 
        'payment_type'
    ];
    use HasFactory;
}
