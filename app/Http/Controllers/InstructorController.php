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

    public function listGroups(Request $request)
    {
        $search = $request->input('search');
        $groups = Group::when($search, function ($query, $search) {
            $query->where('number', 'like', '%' . $search . '%');
        })
        ->paginate(10);

        return view('groups', compact('groups'));
    }

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

    public function listExcuses($group_id)
    {
        $students = User::where('group_id', $group_id)->whereHas('roles', function($query) {
            $query->where('name', 'aprendiz');
        })->get();

        $excuses = Excuse::whereIn('user_id', $students->pluck('id'))->with('aprendiz')->get();

        return view('excuse_list', compact('excuses', 'group_id'));
    }


    public function approveExcuse($id)
    {
        $excuse = Excuse::findOrFail($id);
        $excuse->status = 'Aprobada';
        
        $excuse->save();

        return redirect()->route('instructor.excuses',['group_id'=>$excuse->student->group_id]);
    }

    public function rejectExcuse($id)
    {
        $excuse = Excuse::findOrFail($id);
        $excuse->status = 'Rechazada';
        $excuse->save();

        return redirect()->route('instructor.excuses',['group_id'=>$excuse->student->group_id]);
    }

    public function showScanPage(){
        return view('instructor_scan');
    }


}
