<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $fillable = [
        'id',
        'name',
        'values'
    ];
    use HasFactory;
}
