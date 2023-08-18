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
        $selectedDate = $request->input('date', '');
        $attendancesQuery = Attendance::where('user_id', $user->id);
        
        
        

        $startDate = '2023-07-27'; 
        $endDate = date('Y-m-d'); 
        $dateRange = $this->createDateRange($startDate, $endDate);
        $dateRange = array_reverse($dateRange);


        if ($selectedDate) {
            $attendancesQuery->whereDate('date', $selectedDate);
            $dateRange = [$selectedDate];
        } else {
            $attendancesQuery->orderBy('date', 'desc');
            $dateRange = $this->createDateRange($startDate, $endDate);
            $dateRange = array_reverse($dateRange);
        }

        
        $attendancesArray = $attendancesQuery->get()->keyBy('date')->toArray();

        
        $attendanceStatuses = [];
        foreach ($dateRange as $date) {
            if (isset($attendancesArray[$date])) {
                $attendanceStatuses[] = $attendancesArray[$date];
            } else {
                $attendanceStatuses[] = [
                    'date' => $date,
                    'status' => 'absent',
                    
                ];
            }
        }

        
        $attendanceStatuses = collect($attendanceStatuses)->paginate(10);

        return view('dashboard', compact('attendanceStatuses', 'selectedDate'));
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
