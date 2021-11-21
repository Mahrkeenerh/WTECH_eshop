<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id',
        'name',
        'parent'
    ];
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'category_id');
    }
}
