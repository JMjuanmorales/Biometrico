<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    /**
     * Modelo de Asistencia.
     *
     * Este modelo representa la asistencia de los usuarios en diferentes sesiones.
     *
     * Variables importantes:
     * - $fillable: Atributos que se pueden asignar de manera masiva.
     *
     * Relaciones:
     * - user(): Relación que indica a qué usuario pertenece la asistencia.
     *
     * Métodos importantes:
     * - scopeOnlyAbsences($query): Scope que filtra los registros de asistencia donde el estado es 'ausente'.
     *
     */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'check_in_time',
        'check_out_time',
        'status',
        'session_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeOnlyAbsences($query)
    {
        return $query->where('status', 'ausente');
    }
    
}
