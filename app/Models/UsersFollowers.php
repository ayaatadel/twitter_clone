<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersFollowers extends Model
{
    protected $fillable = [
        'following_id',
        'follower_id'
    ];
    public $timestamps = false;
}
