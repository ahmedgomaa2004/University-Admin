<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Get counts with 5 minutes cache
        $counts = Cache::remember('dashboard_counts', 300, function () {
            return [
                'doctors' => DB::table('doctors')->count(),
                'students' => DB::table('students')->count(),
                'courses' => DB::table('courses')->count(),
                'employees' => DB::table('employees')->count(),
                'departments' => DB::table('departments')->count(),
            ];
        });

        // Get students per department for chart
        $studentsPerDepartment = Cache::remember('students_per_department', 300, function () {
            return DB::table('students')
                ->join('departments', 'students.department_id', '=', 'departments.id')
                ->select('departments.name', DB::raw('COUNT(students.id) as count'))
                ->groupBy('departments.id', 'departments.name')
                ->get();
        });

        $c_s_count = DB::select('SELECT  
    s.courses_id,
    c.name,  
    COUNT(DISTINCT s.student_id) AS student_count
FROM student_courses s 
LEFT JOIN courses c ON s.courses_id = c.id
GROUP BY s.courses_id, c.name;

');

       
        return view('welcome', compact(
            'counts',
            'studentsPerDepartment',
            'c_s_count'
        ));
    }

    public function getStudentsPerDepartment()
    {
        $data = Cache::remember('students_per_department_chart', 300, function () {
            $result = DB::table('students')
                ->join('departments', 'students.department_id', '=', 'departments.id')
                ->select('departments.name', DB::raw('COUNT(students.id) as count'))
                ->groupBy('departments.id', 'departments.name')
                ->get();

            return [
                'labels' => $result->pluck('name')->toArray(),
                'data' => $result->pluck('count')->toArray(),
            ];
        });

        return response()->json($data);
    }

    public function globalSearch(Request $request)
    {
        $query = $request->get('q');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $results = collect();

        // Search in students
        $students = DB::table('students')
            ->where('name', 'LIKE', "%{$query}%")
            ->select('id', 'name', DB::raw("'Student' as type"))
            ->limit(5)
            ->get();
        $results = $results->merge($students);

        // Search in doctors
        $doctors = DB::table('doctors')
            ->where('name', 'LIKE', "%{$query}%")
            ->select('id', 'name', DB::raw("'Doctor' as type"))
            ->limit(5)
            ->get();
        $results = $results->merge($doctors);

        // Search in employees
        $employees = DB::table('employees')
            ->where('name', 'LIKE', "%{$query}%")
            ->select('id', 'name', DB::raw("'Employee' as type"))
            ->limit(5)
            ->get();
        $results = $results->merge($employees);

        // Search in courses
        $courses = DB::table('courses')
            ->where('name', 'LIKE', "%{$query}%")
            ->select('id', 'name', DB::raw("'Course' as type"))
            ->limit(5)
            ->get();
        $results = $results->merge($courses);

        return response()->json($results->take(5));
    }

    private function getGreeting($hour)
    {
        if ($hour >= 5 && $hour < 12) {
            return 'Good morning';
        } elseif ($hour >= 12 && $hour < 17) {
            return 'Good afternoon';
        } else {
            return 'Good evening';
        }
    }
}
