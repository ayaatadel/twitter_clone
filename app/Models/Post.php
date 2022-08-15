<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   // use HasFactory;
   protected $fillable =
   [
    'body','img', 'created_at','updated_at'

   ];
   public $timestamps = true;

    public function user()
    {
    //    return $this->belongsTo(User::class, 'id','user_id');
    return $this->belongsTo(User::class,'user_id');

    }

    // getter
    public function getImageUrlAttribute(){
        return asset('storage/posts_image/'.$this->img);
    }

}
