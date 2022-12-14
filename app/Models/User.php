<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'age',
        'phone',
        'avatar',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $appends = ['avatar_url'];
    public function posts()
    {
        //$this->hasMany(Post::class,'user_id','id');
        return $this->hasMany(Post::class);
    }
    public function getAvatarUrlAttribute()
    {
        if (!$this->avatar) {
            return asset('Images/default-avatar.png');
        }
        return asset('storage/' . $this->avatar);
        // 127.0.0.1/public/storage/avatars/ayat.jpg

        // // ayat.jpg
        // return $this->avatar;

        //   // 127.0.0.1/public/storage/avatars/
        // return asset('storage/avatars/');
    }
    public function followers()
    {
        // people Follows me
        return $this->belongsToMany('App\Models\User', 'users_followers', 'following_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany('App\Models\User', 'users_followers', 'follower_id', 'following_id');
    }
    public function retweets()
    {
        return $this->hasMany(Retweets::class, 'user_id');
    }
}
