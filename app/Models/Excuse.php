<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Excuse extends Model
{
    /**
     * Modelo de Excusa.
     *
     * Este modelo representa las excusas que los usuarios pueden enviar para justificar una ausencia.
     *
     * Variables importantes:
     * - $fillable: Atributos que se pueden asignar de manera masiva.
     *
     * Relaciones:
     * - user(): Relación que indica a qué usuario pertenece la excusa.
     * - aprendiz(): Relación alternativa para especificar a qué aprendiz pertenece la excusa.
     *
     */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'absence_date',
        'justification',
        'document_path',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function aprendiz()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
