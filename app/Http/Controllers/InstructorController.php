<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Group;
use App\Models\User;
use App\Models\Role;
use App\Models\Excuse;
use App\Models\Program;

class InstructorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:instructor']);
    }
    
    /**
     * Lista los grupos
     *
     * Este método muestra una lista paginada de los grupos, 
     * permitiendo la búsqueda por el número de grupo.
     *
     * Variables importantes:
     * - $search: Término de búsqueda ingresado por el usuario.
     * - $groups: Lista paginada de grupos filtrados según el término de búsqueda.
     *
     * Métodos importantes:
     * - paginate($perPage): Pagina los resultados de la consulta.
     * - when($value, $callback): Ejecuta una función de devolución de llamada condicionalmente.
     * - view($viewName, $data): Devuelve una vista con la lista de grupos.
     */
    public function listGroups(Request $request)
    {
        $search = $request->input('search');
        $groups = Group::when($search, function ($query, $search) {
            $query->where('number', 'like', '%' . $search . '%');
        })
        ->paginate(10);

        return view('groups', compact('groups'));
    }

    /**
     * Muestra la asistencia de los estudiantes de un grupo específico en una fecha específica.
     *
     * Este método recopila la información de asistencia de todos los estudiantes que pertenecen a un grupo 
     * específico y muestra la asistencia en una fecha dada.
     *
     * Variables importantes:
     * - $group_id: ID del grupo para el cual se quiere ver la asistencia.
     * - $date: Fecha para la cual se quiere ver la asistencia.
     * - $students: Lista de estudiantes con sus respectivos registros de asistencia.
     * - $group: Grupo específico seleccionado.
     *
     * Métodos importantes:
     * - findOrFail($id): Encuentra un modelo por su clave principal o lanza una excepción si no se encuentra.
     * - whereHas($relation, $callback): Filtra el modelo por una relación.
     * - with($relations): Carga las relaciones del modelo en la memoria.
     */
    public function index(Request $request, $group_id)
    {
        $group = Group::findOrFail($group_id);
        $date = $request->input('date', now()->toDateString());

        $students = User::where('group_id', $group_id)
            ->whereHas('roles', function($query) {
                $query->where('name', 'aprendiz');
            })
            ->with(['attendances' => function ($query) use ($date) {
                $query->whereDate('date', $date);
            }])
            ->get();

        return view('group_attendances', compact('group', 'students', 'date'));
    }

    /**
     * Lista las excusas enviadas por los estudiantes de un grupo específico.
     *
     * Este método recupera todas las excusas enviadas por los estudiantes que pertenecen a un grupo específico y 
     * las muestra en una lista.
     *
     * Variables importantes:
     * - $group_id: ID del grupo seleccionado.
     * - $students: Lista de estudiantes en el grupo.
     * - $excuses: Lista de excusas enviadas por los estudiantes.
     *
     * Métodos importantes:
     * - whereIn($column, $values): Filtra los modelos por un conjunto de valores.
     * - with($relations): Carga las relaciones del modelo en la memoria.
     */
    public function listExcuses($group_id)
    {
        $students = User::where('group_id', $group_id)->whereHas('roles', function($query) {
            $query->where('name', 'aprendiz');
        })->get();

        $excuses = Excuse::whereIn('user_id', $students->pluck('id'))->with('aprendiz')->get();

        return view('excuse_list', compact('excuses', 'group_id'));
    }

    /**
     * Aprueba una excusa enviada por un estudiante.
     *
     * Este método cambia el estado de una excusa específica a 'Aprobada' y guarda los cambios en la base de datos.
     *
     * Variables importantes:
     * - $id: ID de la excusa que se quiere aprobar.
     *
     * Métodos importantes:
     * - findOrFail($id): Encuentra un modelo por su clave principal o lanza una excepción si no se encuentra.
     * - save(): Guarda los cambios en el modelo en la base de datos.
     */
    public function approveExcuse($id)
    {
        $excuse = Excuse::findOrFail($id);
        $excuse->status = 'Aprobada';
        
        $excuse->save();

        return redirect()->route('instructor.excuses',['group_id'=>$excuse->aprendiz->group_id]);
    }

    /**
     * Rechaza una excusa enviada por un estudiante.
     *
     * Este método cambia el estado de una excusa específica a 'Rechazada' y guarda los cambios en la base de datos.
     *
     * Variables importantes:
     * - $id: ID de la excusa que se quiere rechazar.
     *
     * Métodos importantes:
     * - findOrFail($id): Encuentra un modelo por su clave principal o lanza una excepción si no se encuentra.
     * - save(): Guarda los cambios en el modelo en la base de datos.
     */
    public function rejectExcuse($id)
    {
        $excuse = Excuse::findOrFail($id);
        $excuse->status = 'Rechazada';
        $excuse->save();

        return redirect()->route('instructor.excuses',['group_id'=>$excuse->aprendiz->group_id]);
    }

    /**
     * Muestra la página de escaneo de códigos QR para el registro de asistencia de los estudiantes.
     *
     * Este método devuelve una vista que permite al instructor escanear códigos QR generados por los estudiantes para registrar su asistencia.
     *
     * Métodos importantes:
     * - view($viewName): Devuelve la vista para el escaneo de códigos QR.
     */
    public function showScanPage(){
        return view('instructor_scan');
    }
}
