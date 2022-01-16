<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
   use SoftDeletes;
    use Notifiable;
   
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function DanhGia()
    {
        return $this->hasMany(DanhGia::class);
    }
    public function likes()
    {
        return $this->belongsTo(Like::class);
    }
    public function DisLike()
    {
        return $this->belongsTo(DisLike::class);
    }
    public function comments() /////////**** */
    {
        return $this->hasMany(Comment::class);
    }
    public function DiaDanh()
    {
        return $this->belongsTo(DiaDanh::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'image',
        'password'
        // 'ngay_sinh',
        // 'trang_thai'
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
}
