<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Group;
use App\Models\Program;
use Illuminate\Support\Facades\Log;


class AdminController extends Controller
{
    /**
     * Constructor que establece los middleware para la autenticación y la verificación de roles.
     *
     * Configura el middleware para autenticar al usuario y verificar si tiene el rol de administrador.
     * - Método 'middleware': Aplica un filtro de middleware a las peticiones para manejar la autenticación y el rol.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    /**
     * Muestra la vista para crear un nuevo usuario.
     *
     * Este método recopila todos los roles y grupos disponibles y los pasa a la vista 'create'.
     * Se utiliza principalmente en el panel de administración para ofrecer las opciones de
     * creación de nuevos usuarios.
     * - Role::all(): Obtiene todos los roles desde la base de datos.
     * - Group::all(): Obtiene todos los grupos desde la base de datos.
     */
    public function createUser()
    {
        Log::info('AdminController - createUser');
        $roles = Role::all();
        $groups = Group::all();
        return view('create', compact('roles', 'groups'));
    }

    /**
     * Almacena un nuevo usuario en la base de datos.
     *
     * Valida la entrada del usuario y, si es válida, crea un nuevo usuario con los roles seleccionados.
     * - $request->validate(): Valida los datos del formulario según ciertas reglas.
     * - User::create(): Crea una nueva instancia del modelo User y la guarda en la base de datos.
     * - Role::whereIn() y attach(): Busca los roles por su nombre y los asocia con el usuario recién creado.
     */
    public function storeUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'document_type' => 'required|max:255',
            'document' => 'required|max:10',
            'born_date' => 'nullable|max:255',
            'phone_number'=> 'nullable|max:255',
            'emergency_number' => 'nullable|max:255', 
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'roles' => 'required|array',
            'roles.*' => 'in:aprendiz,instructor,admin',
            'group_id' => 'nullable|exists:groups,id',
        ], [
            'document.max' => 'El documento no puede ser de mas de 10 numeros',
            'email.unique' => 'El correo ya está registrado',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password' => 'Las contraseñas debe de ser de mas de 8 caracteres',
            'roles' => 'Debe selecionar un rol'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'last_name' => $validatedData['last_name'],
            'document_type' => $validatedData['document_type'],
            'document' => $validatedData['document'],
            'born_date' => $validatedData['born_date'],
            'phone_number' => $validatedData['phone_number'],
            'emergency_number' => $validatedData['emergency_number'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'group_id' => $validatedData['group_id'],
        ]);
    

        $roles = Role::whereIn('name', $validatedData['roles'])->get();
        $user->roles()->attach($roles);

        session()->flash('success', 'Usuario creado correctamente');

        return redirect()->route('admin.create-user');
    }

    /**
     * Lista todos los usuarios en el sistema.
     *
     * Muestra una vista con una lista de todos los usuarios almacenados en la base de datos.
     * - User::all(): Obtiene todas las instancias de usuarios desde la base de datos.
     */    
    public function listUsers()
    {
        $users = User::all();
        return view('users_list', compact('users'));
    }

    /**
     * Edita un usuario existente en la base de datos.
     *
     * Este método recopila información del usuario específico junto con todos los roles y grupos 
     * disponibles y los pasa a la vista 'edit_user'.
     *
     * Variables importantes:
     * - $user: Representa al usuario que se desea editar. Se obtiene usando el método 'findOrFail' de Eloquent, lo que significa que si el usuario con el ID especificado no se encuentra, se lanzará una excepción.
     * - $roles y $groups: Contienen todos los roles y grupos, respectivamente, obtenidos de la base de datos.
     *
     * Métodos importantes:
     * - findOrFail($id): Busca un modelo por su clave primaria, si no lo encuentra, arroja un error.
     *
     */
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $groups = Group::all();
        return view('edit_user', compact('user', 'roles', 'groups'));
    }

    /**
     * Actualiza la información de un usuario existente en la base de datos.
     *
     * Este método valida los datos ingresados en el formulario y, si son válidos, actualiza la información 
     * del usuario en la base de datos y sincroniza sus roles.
     *
     * Variables importantes:
     * - $validatedData: Datos del formulario después de haber pasado la validación.
     * - $user: Usuario que se desea actualizar.
     * - $roles: Roles que se quieren asignar al usuario.
     *
     * Métodos importantes:
     * - validate($rules): Valida los datos de entrada según las reglas definidas.
     * - findOrFail($id): Busca un modelo por su clave primaria, si no lo encuentra, arroja un error.
     * - update($attributes): Actualiza el modelo en la base de datos.
     * - sync($roles): Sincroniza la tabla intermedia con la lista de IDs dada.
     *
     */
    public function updateUser(Request $request, $id)
    {   
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'document_type' => 'required|max:255',
            'document' => 'required|max:10',
            'born_date' => 'nullable|max:255',
            'phone_number'=> 'nullable|max:255',
            'emergency_number' => 'nullable|max:255', 
            'email' => 'nullable|email|max:255|unique:users,email,' . $id,
            'roles' => 'array',
            'roles.*' => 'in:student,instructor,admin',
            'group_id' => 'nullable|exists:groups,id',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $validatedData['name'],
            'last_name' => $validatedData['last_name'],
            'document_type' => $validatedData['document_type'],
            'document' => $validatedData['document'],
            'born_date' => $validatedData['born_date'],
            'phone_number' => $validatedData['phone_number'],
            'emergency_number' => $validatedData['emergency_number'],
            'email' => $validatedData['email'],
            'group_id' => $validatedData['group_id'],
        ]);

        $roles = Role::whereIn('name', $validatedData['roles'])->get();
        $user->roles()->sync($roles);

        session()->flash('success', 'Usuario actualizado correctamente');

        return redirect()->route('admin.users');
    }

    /**
     * Registra múltiples usuarios a partir de un archivo CSV.
     *
     * Este método toma un archivo CSV cargado, lo procesa para extraer la información de los usuarios y 
     * los registra en la base de datos. Si el usuario ya existe, se omite.
     *
     * Variables importantes:
     * - $userFile: Archivo CSV cargado.
     * - $fileContents: Contenido del archivo en forma de texto.
     * - $usersData: Array que contiene los datos de los usuarios.
     * - $createdUsers y $existingUsers: Arrays que contienen los usuarios recién creados y los ya existentes, respectivamente.
     *
     * Métodos importantes:
     * - validate($rules): Valida los datos de entrada según las reglas definidas.
     * - hasFile($file): Verifica si el archivo se cargó correctamente.
     * - file($file): Obtiene el archivo cargado.
     * - getRealPath(): Obtiene la ruta del archivo.
     * - attach($roles): Asocia los roles al modelo.
     *
     */
    public function manyUsers(Request $request) {
        $request->validate([
            'user_file' => 'required|file|mimetypes:csv'
        ], [
            'user_file.mimetypes' => 'El archivo debe ser de tipo csv.',
            'user_file.required' => 'Es necesario seleccionar un archivo.',
        ]);
        
        
        if ($request->hasFile('user_file')) {
            $userFile = $request->file('user_file');
            $fileContents = file_get_contents($userFile->getRealPath());
            $usersData = explode("\n", $fileContents);
    
            $createdUsers = [];
            $existingUsers = [];
    
            // Obtener el rol que deseas asignar a todos los usuarios
            $roleName = $request->input("roles"); // Reemplaza 'nombre_del_rol' con el nombre real del rol
    
            foreach ($usersData as $userLine) {
                $userDataArray = explode(';', $userLine);
    
                if (count($userDataArray) >= 5) {
                    $existingUser = User::where('document', $userDataArray[3])
                        ->orWhere('email', $userDataArray[4])
                        ->first();
    
                    if ($existingUser) {
                        $existingUsers[] = $existingUser;
                        continue;
                    }
    
                     $newUser = new User();
                     $newUser->name = $userDataArray[0];
                     $newUser->last_name = $userDataArray[1];
                     $newUser->document_type = $userDataArray[2];
                     $newUser->document = $userDataArray[3];
                     $newUser->email = $userDataArray[4];
                     $newUser->password = Hash::make($userDataArray[3]);
                  
    
                    $newUser->save();
                    $roles = Role::whereIn('name', $roleName)->get();
                    $newUser->roles()->attach($roles);
                    $createdUsers[] = $newUser;
    
                    // Asignar el rol al usuario recién creado
                }
            }
    
            if (count($existingUsers) === count($usersData)) {
                session()->flash('error', 'Todos los usuarios ya estan registrados');
                return redirect()->route('admin.users');
            }

            session()->flash('success', 'Usuarios registrados correctamente');    

            return redirect()->route('admin.users');
        }
    }

    /**
     * Muestra el formulario para registrar múltiples usuarios.
     *
     * Este método recupera todos los roles disponibles y los pasa a la vista 'create_many_users'.
     *
     * Variables importantes:
     * - $roles: Contiene todos los roles disponibles, obtenidos de la base de datos.
     *
     */
    public function createUsers()
    {
        Log::info('AdminController - createUser');
        $roles = Role::all();
        return view('create_many_users', compact('roles'));
    }
    
    /**
     * Muestra el formulario para crear un nuevo programa.
     *
     * Este método simplemente redirige al usuario a la vista 'create_program'.
     *
     */
    public function showCreateProgramForm()
    {
        return view('create_program');
    }

    /**
     * Crea un nuevo programa en la base de datos.
     *
     * Este método valida los datos del formulario y, si son válidos, crea un nuevo programa.
     *
     * Variables importantes:
     * - $program: Representa el nuevo programa que se va a crear.
     *
     * Métodos importantes:
     * - validate($rules): Valida los datos de entrada según las reglas definidas.
     * - save(): Guarda el modelo en la base de datos.
     *
     */
    public function createProgram(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:programs,name|max:255',
        ], [
            'name.unique' => 'Este programa ya existe.'
        ]);

        $program = new Program([
            'name' => $request->input('name'),
        ]);

        $program->save();

        session()->flash('success', 'Programa creado correctamente');

        return redirect()->route('admin.create-user');
    }

    /**
     * Muestra el formulario para crear un nuevo grupo.
     *
     * Este método recopila todos los programas disponibles y los pasa a la vista 'create_group'.
     *
     * Variables importantes:
     * - $programs: Contiene todos los programas disponibles, obtenidos de la base de datos.
     *
     */
    public function showCreateGroupForm()
    {
        $programs = Program::all();
        return view('create_group', compact('programs'));
    }

    /**
     * Crea un nuevo grupo en la base de datos.
     *
     * Este método valida los datos del formulario y, si son válidos, crea un nuevo grupo.
     *
     * Variables importantes:
     * - $group: Representa el nuevo grupo que se va a crear.
     *
     * Métodos importantes:
     * - validate($rules): Valida los datos de entrada según las reglas definidas.
     * - save(): Guarda el modelo en la base de datos.
     *
     */
    public function createGroup(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'number' => 'required|integer|unique:groups,number',
        ], [
            'number.unique' => 'El número de ficha ya existe. Por favor, elige un número diferente.',
        ]);

        $group = new Group([
            'program_id' => $request->input('program_id'),
            'number' => $request->input('number'),
        ]);

        $group->save();

        session()->flash('success', 'Grupo creado correctamente');

        return redirect()->route('admin.create-user');
    }

    /**
     * Muestra una lista paginada de grupos.
     *
     * Este método toma una cadena de búsqueda opcional y muestra los grupos que coinciden con ella.
     * Utiliza paginación para limitar los resultados mostrados.
     *
     * Variables importantes:
     * - $search: Almacena el valor de búsqueda proporcionado en el formulario.
     * - $groups: Contiene los grupos que coinciden con el criterio de búsqueda.
     *
     * Métodos importantes:
     * - paginate($limit): Limita el número de registros que se mostrarán por página.
     *
     */
    public function listGroups(Request $request){
        $search = $request->input('search');
        $groups = Group::when($search, function ($query, $search) {
            $query->where('number', 'like', '%' . $search . '%');
        })
        ->paginate(10);

        return view('list-groups', compact('groups'));
    }

    /**
     * Muestra una lista de usuarios que pertenecen a un grupo específico.
     *
     * Este método recupera todos los usuarios que pertenecen al grupo proporcionado y tienen el rol de 'aprendiz'.
     *
     * Variables importantes:
     * - $group: Representa el grupo en el cual se están buscando usuarios.
     * - $students: Almacena los usuarios que pertenecen al grupo y tienen el rol de 'aprendiz'.
     *
     * Métodos importantes:
     * - findOrFail($id): Recupera un modelo por su clave primaria o lanza una excepción si el modelo no se encuentra.
     * - whereHas($relation, $callback): Aplica una restricción de existencia al modelo relacionado.
     *
     */
    public function listUsersFichas(Request $request, $group_id)
    {
        $group = Group::findOrFail($group_id);

        $students = User::where('group_id', $group_id)
            ->whereHas('roles', function($query) {
                $query->where('name', 'aprendiz');
            })->get();

        return view('list_user_group', compact('group', 'students'));
    }
}
