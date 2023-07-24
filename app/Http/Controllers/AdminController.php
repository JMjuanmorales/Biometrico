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
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function createUser()
    {
        Log::info('AdminController - createUser');
        $roles = Role::all();
        $groups = Group::all();
        return view('create', compact('roles', 'groups'));
    }

    public function storeUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'roles' => 'required|array',
            'roles.*' => 'in:student,instructor,admin',
            'group_id' => 'nullable|exists:groups,id',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'group_id' => $validatedData['group_id'],
        ]);

        $roles = Role::whereIn('name', $validatedData['roles'])->get();
        $user->roles()->attach($roles);
        Log::info('Request data:', $request->all());

        return redirect()->route('admin.create-user')->with('success', 'Usuario creado correctamente');
    }
    public function listUsers()
    {
        $users = User::all();
        return view('users_list', compact('users'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $groups = Group::all();
        return view('edit_user', compact('user', 'roles', 'groups'));
    }

    public function updateUser(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'roles' => 'required|array',
            'roles.*' => 'in:student,instructor,admin',
            'group_id' => 'nullable|exists:groups,id',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'group_id' => $validatedData['group_id'],
        ]);

        $roles = Role::whereIn('name', $validatedData['roles'])->get();
        $user->roles()->sync($roles);

        return redirect()->route('admin.users')->with('success', 'Usuario actualizado correctamente');
    }

    public function showCreateProgramForm()
    {
        return view('create_program');
    }

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

        return redirect()->route('admin.create-user')->with('success', 'Programa creado correctamente.');
    }

    public function showCreateGroupForm()
    {
        $programs = Program::all();
        return view('create_group', compact('programs'));
    }

    public function createGroup(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'number' => 'required|integer|unique:groups,number',
        ], [
            'number.unique' => 'El número de grupo ya existe. Por favor, elige un número diferente.',
        ]);

        $group = new Group([
            'program_id' => $request->input('program_id'),
            'number' => $request->input('number'),
        ]);

        $group->save();

        return redirect()->route('admin.create-user')->with('success', 'Grupo creado correctamente.');
    }

    public function listGroups(Request $request){
        $search = $request->input('search');
        $groups = Group::when($search, function ($query, $search) {
            $query->where('number', 'like', '%' . $search . '%');
        })
        ->paginate(10);

        return view('list-groups', compact('groups'));
    }
}
