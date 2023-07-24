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
    public function index()
    {

    }

    public function checkIn(Request $request)
    {

        $user = Auth::user();
        $today = date('Y-m-d');

        
        $lastAttendance = Attendance::where('user_id', $user->id)
            ->where('date', $today)
            ->orderBy('session_id', 'desc')
            ->first();

        $newSessionId = $lastAttendance ? $lastAttendance->session_id + 1 : 1;

        
        $newAttendance = new Attendance();
        $newAttendance->user_id = $user->id;
        $newAttendance->date = $today;
        $newAttendance->check_in_time = now();
        $newAttendance->status = 'present';
        $newAttendance->session_id = $newSessionId;
        $newAttendance->save();

        return redirect()->back()->with('success', 'Entrada registrada exitosamente.');
        }

    public function checkOut(Request $request)
    {
        $user = Auth::user();
        $today = date('Y-m-d');

        
        $attendance = Attendance::where('user_id', $user->id)
            ->where('date', $today)
            ->whereNull('check_out_time')
            ->orderBy('session_id', 'desc')
            ->first();

        if (!$attendance) {
            return redirect()->back()->with('error', 'No has registrado tu entrada hoy.');
        } else {
            
            $attendance->check_out_time = now();
            $attendance->save();

            return redirect()->back()->with('success', 'Salida registrada exitosamente.');
        }
    }

    private function createDateRange($startDate, $endDate)
    {
        $start = new DateTime($startDate);
        $end = new DateTime($endDate);
        $interval = new DateInterval('P1D');
        $period = new DatePeriod($start, $interval, $end->modify('+1 day'));

        $dates = [];
        foreach ($period as $date) {
            $dates[] = $date->format('Y-m-d');
        }

        return $dates;
    }

    public function teacherIndex($group_id, Request $request)
    {
        $selectedDate = $request->input('date', '');

        
        $students = User::whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->where('group_id', $group_id)
        ->with(['attendances' => function ($query) use ($selectedDate) {
            if (!empty($selectedDate)) {
                $query->where('date', $selectedDate);
            }
        }])->get();

        return view('teacher.dashboard', compact('students', 'selectedDate', 'group_id')); 
    }


}
