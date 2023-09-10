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
            return response()->json(['success' => false, 'error' => 'No check-in registrado para hoy']);
        } else {
            $attendance->check_out_time = now();
            $attendance->status = 'Asistió';
            $attendance->save();

            return response()->json(['success' => true]);
        }
    }  

}
