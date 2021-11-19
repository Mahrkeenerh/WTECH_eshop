<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'id', 
        'name', 
        'category_id', 
        'price', 
        'sale', 
        'description', 
        'info_json'
    ];
    use HasFactory;
}
