<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Routing\Loader\ProtectedPhpFileLoader;

class role_user extends Model
{
    /**
     * Modelo role_user (Tabla Pivote).
     *
     * Este modelo representa la tabla intermedia (pivote) que permite la relación de muchos a muchos entre usuarios y roles.
     * Así, un usuario puede tener múltiples roles y un rol puede ser asignado a múltiples usuarios.
     *
     * Variables importantes:
     * - $fillable: Atributos que se pueden asignar de manera masiva.
     *
     */
    use HasFactory;
    Protected $fillable=['user_id', 'role_id'];
}
