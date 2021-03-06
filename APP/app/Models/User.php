<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $fillable = [
        'id',
        'email',
        'password_hash',
        'first_name',
        'last_name',
        'state',
        'city',
        'street_and_number',
        'postal_code'
    ];
    use HasFactory;

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}
