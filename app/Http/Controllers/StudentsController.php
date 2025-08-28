<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = DB::select('SELECT 
        s.id AS s_id,
        s.age,
        s.address,
        s.gender,
        s.sname,
        d.id AS d_id,
        d.name AS doctor_name,
        GROUP_CONCAT(c.name SEPARATOR "-") AS courses,
        IFNULL(SUM(c.hours), 0) AS total_hours
        FROM students s
        LEFT JOIN doctors d ON s.doctor_id = d.id
        LEFT JOIN student_courses sc ON s.id = sc.student_id
        LEFT JOIN courses c ON sc.courses_id = c.id
        GROUP BY s.id, s.age, s.address, s.gender, s.sname, d.id, d.name;'); 

        return view("students.index", compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = DB::table('courses')->get();
        $doctors = DB::table('doctors')->get();

    

        return view('students.create', ['courses' => $courses, 'doctors' => $doctors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('students')->insert([
        'sname'    => $request->input('name'),
        'age'     => $request->input('age'),
        'address' => $request->input('address'),
        'gender'  => $request->input('gender'),
        'doctor_id'  => $request->input('doctor_id'),]);

        return redirect()->back()->with('success', 'student added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $students = DB::table('students')->where('id', $id)->first();
        $s_courses = DB::table('student_courses')->where('student_id', $id)->pluck('courses_id')->toArray(); 
        $courses = DB::select('SELECT * FROM courses');
        $doctors = DB::select('SELECT * FROM doctors');

        return view('students.edit')->with(['students'=>$students,'doctors'=>$doctors,'s_courses'=>$s_courses, 'courses'=>$courses]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd($request->all());
        DB::table('students')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'age' => $request->input('age'),
                'address' => $request->input('address'),
                'gender'=> $request->input('gender'),
                'salary'=> $request->input('salary')
            ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('students')->where('id', $id)->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
