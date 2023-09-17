<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use DateTime;
use DateInterval;
use DatePeriod;
use Illuminate\Http\Request;

class DashboardController extends Controller
{ 
    /**
     * Muestra el estado de asistencia del usuario en el tablero.
     *
     * Este método recupera todos los registros de asistencia para el usuario actual y la fecha seleccionada,
     * y los presenta en una vista de tablero paginada.
     *
     * Variables importantes:
     * - $user: El usuario actualmente autenticado.
     * - $today: Fecha actual.
     * - $selectedDate: Fecha seleccionada para ver registros de asistencia, por defecto es hoy.
     * - $attendancesQuery: Consulta para obtener registros de asistencia del usuario.
     * - $attendanceStatuses: Resultados paginados de la consulta de registros de asistencia.
     * - $isToday: Bandera que indica si la fecha seleccionada es la fecha actual.
     *
     * Métodos importantes:
     * - Auth::user(): Obtiene el usuario actualmente autenticado.
     * - where($column, $value): Filtra los registros de asistencia por columna y valor.
     * - whereDate($column, $value): Filtra los registros de asistencia por fecha.
     * - orderBy($column, $direction): Ordena los registros de asistencia.
     * - paginate($perPage): Pagina los resultados de la consulta.
     *
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $today = date('Y-m-d');
        $selectedDate = $request->input('date', $today);

        $attendancesQuery = Attendance::where('user_id', $user->id);

        if ($selectedDate) {
            $attendancesQuery->whereDate('date', $selectedDate);
        }

        $attendanceStatuses = $attendancesQuery->orderBy('date', 'desc')->paginate(10);
        $isToday = ($selectedDate === $today);

        return view('dashboard', compact('attendanceStatuses', 'selectedDate', 'isToday'));
    }

    /**
     * Muestra las excusas registradas del usuario.
     *
     * Este método recupera todas las excusas asociadas con el usuario autenticado y las presenta en una vista.
     *
     * Variables importantes:
     * - $user: El usuario actualmente autenticado.
     * - $excuses: Colección de excusas asociadas con el usuario.
     *
     * Métodos importantes:
     * - auth()->user(): Obtiene el usuario actualmente autenticado.
     *
     */
    public function viewExcuses()
    {
        $user = auth()->user();
        $excuses = $user->excuses ?? collect();

        return view('view_excuses', compact('excuses'));
    }
}
