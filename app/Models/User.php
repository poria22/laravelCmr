<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'profile',
        'phone',
        'email',
        'role',
        'password',
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

    public function getrolefarsi()
    {
        if ($this->role ==='admin'){
            return 'مدیر';
        }
        elseif ($this->role === 'author'){
            return 'نویسنده';
        }
        else {
            return 'کاربر عادی';
        }
    }

    public function getCreatedJalali()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function getprofile()
    {
        return asset('images/users/' .$this->profile);
    }
}
