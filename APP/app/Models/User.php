<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'email', 'password_hash', 'first_name', 'last_name', 'state', 'city', 'street_and_number', 'postal_code'];
    use HasFactory;
}
