<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $fillable = [
        'username', 'password', 'fullname', 'email',
        'phoneNumber', 'gender', 'address', 'role',
        'createdAt', 'updatedAt'
    ];

    public $timestamps = false;
}
