<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /**
     * Modelo de Usuario.
     *
     * Este modelo representa a los usuarios del sistema, que pueden tener diferentes roles y pertenecer a distintos grupos.
     *
     * Variables importantes:
     * - $fillable: Atributos que se pueden asignar de manera masiva.
     * - $hidden: Atributos que deben estar ocultos para las matrices.
     *
     * Relaciones:
     * - attendances(): Relación que indica las asistencias que pertenecen a este usuario.
     * - roles(): Relación que indica los roles que tiene este usuario.
     * - group(): Relación que indica a qué grupo pertenece el usuario.
     * - excuses(): Relación que indica las excusas que ha presentado el usuario.
     * - passwordReset(): Relación que indica si el usuario tiene un token de restablecimiento de contraseña.
     *
     * Métodos importantes:
     * - hasRole($roleName): Determina si el usuario tiene un rol específico.
     *
     */
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'last_name',
        'document_type',
        'document',
        'born_date',
        'phone_number',
        'emergency_number',
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

