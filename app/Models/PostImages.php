<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImages extends Model
{
    // use HasFactory;
    protected $fillable = [
        'post_id', 'img_url'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    // public function getImgUrlAttribute()
    // {
    //     return asset('storage/' . $this->img_url);
    // }
}
