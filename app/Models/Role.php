<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    /**
     * Modelo de Rol.
     *
     * Este modelo representa los diferentes roles que pueden tener los usuarios en el sistema.
     *
     * Variables importantes:
     * - $fillable: Atributos que se pueden asignar de manera masiva.
     *
     * Relaciones:
     * - users(): Relación que indica los usuarios que tienen este rol.
     *
     */
    use HasFactory;

    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }
}
