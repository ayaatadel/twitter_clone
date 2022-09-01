<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // use HasFactory;
    protected $fillable =
    [
        'body', 'img', 'created_at', 'updated_at', 'user_id'

    ];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function likes()
    {
        return $this->hasMany(Like::class, 'post_id')->count();
    }
    public function comments()
    {
        return $this->hasMany(Comments::class, 'post_id');
    }
    // getter
    // public function getImageUrlAttribute()
    // {
    //     return asset('storage/' . $this->img);
    // }

    public function images()
    {
        return $this->hasMany(PostImages::class, 'post_id');
    }
}
