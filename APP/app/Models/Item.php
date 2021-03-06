<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    protected $fillable = [
        'id',
        'name',
        'category_id',
        'new_price',
        'old_price',
        'description',
        'info_json'
    ];
    use HasFactory;
    use SoftDeletes;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
