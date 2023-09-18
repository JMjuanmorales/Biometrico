<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Program;
use App\Models\User;

class Group extends Model
{
    /**
     * Modelo de Grupo.
     *
     * Este modelo representa los grupos de estudiantes dentro de un programa específico.
     *
     * Variables importantes:
     * - $fillable: Atributos que se pueden asignar de manera masiva.
     *
     * Relaciones:
     * - students(): Relación que indica los usuarios que pertenecen a este grupo.
     * - program(): Relación que indica a qué programa pertenece el grupo.
     *
     */
    use HasFactory;

    protected $fillable = [
        'program_id',
        'number'
    ];

    public function students()
    {
        return $this->hasMany(User::class, 'group_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
