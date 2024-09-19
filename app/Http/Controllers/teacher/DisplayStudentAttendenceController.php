<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentAttendence;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DisplayStudentAttendenceController extends Controller
{
    public function display_student_attendence(Request $request){
        // Get month and year from request or default to current month and year
        $selectedMonth = $request->input('month', Carbon::now()->month);
        $selectedYear = $request->input('year', Carbon::now()->year);

        // Get campus of the logged-in teacher
        $user = Auth::user();
        $campus = $user->campus;

        // Fetch attendance data for the selected month, year, and campus
        $student_attendence = StudentAttendence::whereMonth('date', $selectedMonth)
            ->whereYear('date', $selectedYear)
            ->whereHas('user', function ($query) use ($campus) {
                $query->where('campus', $campus);
            })
            ->get();

        return view('teacher.show_student_attendence', [
            'student_attendence' => $student_attendence,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
        ]);
    }
}
