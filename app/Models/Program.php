<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;

class Program extends Model
{
    /**
     * Modelo de Programa.
     *
     * Este modelo representa los programas de formación que contienen varios grupos.
     *
     * Variables importantes:
     * - $fillable: Atributos que se pueden asignar de manera masiva.
     *
     * Relaciones:
     * - groups(): Relación que indica los grupos que pertenecen a este programa.
     *
     */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
