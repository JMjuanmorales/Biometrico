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

    public function viewExcuses()
    {
        $user = auth()->user();
        $excuses = $user->excuses ?? collect();

        return view('view_excuses', compact('excuses'));
    }
}
