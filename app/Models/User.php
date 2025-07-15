<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;

class User extends Model implements AuthenticatableContract
{
    use Notifiable, Authenticatable;

    protected $connection = 'mongodb'; 
    protected $collection = 'users';   

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
