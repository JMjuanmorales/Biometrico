<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'group_id',
    ];

    protected $hidden = [
        'password',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    

    protected $casts = [
        
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function excuses()
    {
        return $this->hasMany(Excuse::class);
    }

    public function hasRole($roleName)
    {
        return $this->roles->pluck('name')->contains($roleName);
    }
    public function passwordReset()
    {
        return $this->hasOne(PasswordReset::class, 'email', 'email');
    }

}

