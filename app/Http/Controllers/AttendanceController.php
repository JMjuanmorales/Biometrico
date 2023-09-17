<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use App\Models\User;
use DateTime;
use DateInterval;
use DatePeriod;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Registra la hora de entrada de un usuario para una nueva sesión de asistencia.
     *
     * Este método crea un nuevo registro de asistencia para un usuario específico, 
     * estableciendo la hora actual como su hora de entrada.
     *
     * Variables importantes:
     * - $userId: ID del usuario que está registrando la entrada.
     * - $today: Fecha actual.
     * - $lastAttendance: Último registro de asistencia del usuario para el día actual.
     * - $newSessionId: ID de la nueva sesión que se está iniciando.
     * - $newAttendance: Nuevo objeto de asistencia que se guardará en la base de datos.
     *
     * Métodos importantes:
     * - where($column, $value): Filtra los registros de asistencia por columna y valor.
     * - orderBy($column, $direction): Ordena los registros de asistencia.
     * - first(): Obtiene el primer resultado de la consulta.
     * - save(): Guarda el nuevo registro de asistencia en la base de datos.
     *
     */
    public function checkIn(Request $request)
    {
        $userId = $request->input('user_id');
        $today = date('Y-m-d');

        $lastAttendance = Attendance::where('user_id', $userId)
            ->where('date', $today)
            ->orderBy('session_id', 'desc')
            ->first();

        $newSessionId = $lastAttendance ? $lastAttendance->session_id + 1 : 1;

        $newAttendance = new Attendance();
        $newAttendance->user_id = $userId;
        $newAttendance->date = $today;
        $newAttendance->check_in_time = now();
        $newAttendance->status = 'No registró salida';
        $newAttendance->session_id = $newSessionId;
        $newAttendance->save();

        return response()->json(['success' => true]);
    }

    /**
     * Registra la hora de salida del usuario para cerrar la sesión de asistencia actual.
     *
     * Este método busca el registro de asistencia más reciente para el usuario y la fecha actual
     * en el cual aún no se ha registrado una hora de salida. Luego, actualiza este registro 
     * con la hora actual como su hora de salida y cambia su estado a 'Asistió'.
     *
     * Variables importantes:
     * - $userId: ID del usuario que está registrando la salida.
     * - $today: Fecha actual.
     * - $attendance: Registro de asistencia actual que se actualizará con la hora de salida.
     *
     * Métodos importantes:
     * - where($column, $value): Filtra los registros de asistencia por columna y valor.
     * - whereNull($column): Filtra los registros de asistencia donde la columna especificada es NULL.
     * - orderBy($column, $direction): Ordena los registros de asistencia.
     * - first(): Obtiene el primer resultado de la consulta.
     * - save(): Actualiza el registro de asistencia en la base de datos con la hora de salida.
     *
     */
    public function checkOut(Request $request)
    {
        $userId = $request->input('user_id');
        $today = date('Y-m-d');

        $attendance = Attendance::where('user_id', $userId)
            ->where('date', $today)
            ->whereNull('check_out_time')
            ->orderBy('session_id', 'desc')
            ->first();

        if (!$attendance) {
            return response()->json(['success' => false, 'error' => 'No hay una entrada registrada hoy']);
        } else {
            $attendance->check_out_time = now();
            $attendance->status = 'Asistió';
            $attendance->save();

            return response()->json(['success' => true]);
        }
    }  
}
