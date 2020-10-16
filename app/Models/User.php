<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Followable;

class User extends Authenticatable
{
    use HasFactory, Notifiable,Followable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'avatar',
        'banner'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timeline()
    {
        $friends = $this->follows()->pluck('id');
        
        
       return Tweet::whereIn('user_id',$friends)->orWhere('user_id',$this->id)->latest()->paginate(7);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function getAvatarAttribute($value)
    {
        if(isset($value)) {

            return asset('storage/' . $value );
    
        } else {
    
            return asset('images/default.png');
        }
    }

    public function getBannerAttribute($value)
    {
        if(isset($value)) {

            return asset('storage/' . $value );
    
        } else {
    
            return asset('images\default-profile-banner.jpg');
        }
    }



    public function follows()
    {
        return $this->belongsToMany(User::class,'follows','user_id','following_user_id');
    }

    public function following(User $user)
    {
      return $this->follows()->where('following_user_id',$user->id)->exists();
    }

    public function toggleFollow(User $user)
    {
        $this->follows()->toggle($user);
    }


    public function path()
    {
        return route('profile',$this->username);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    
}
