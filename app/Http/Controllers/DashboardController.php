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
        
        $counts =[  'doctors' => DB::table('doctors')->count(),
                    'students' => DB::table('students')->count(),
                    'courses' => DB::table('courses')->count(),
                    'employees' => DB::table('employees')->count(),
                    'departments' => DB::table('departments')->count()];

        $c_s_count = DB::select('SELECT s.courses_id, c.name, COUNT(DISTINCT s.student_id) AS student_count 
                                        FROM student_courses s LEFT JOIN courses c ON s.courses_id = c.id 
                                        GROUP BY s.courses_id, c.name;');

        return view('welcome', compact('counts','c_s_count'));
    }
}
