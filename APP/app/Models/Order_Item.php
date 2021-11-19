<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
    protected $fillable = [
        'id', 
        'order_id', 
        'amount', 
        'unit_price', 
        'item_id'
    ];
    use HasFactory;
}
