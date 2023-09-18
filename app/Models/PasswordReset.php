<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    /**
     * Modelo de Restablecimiento de Contraseña.
     *
     * Este modelo representa los tokens generados para el proceso de restablecimiento de contraseña.
     *
     * Variables importantes:
     * - $fillable: Atributos que se pueden asignar de manera masiva.
     *
     */
    use HasFactory;

    protected $table = 'password_reset_tokens';
    protected $fillable = ['email', 'token'];
    public $timestamps = false;
}
