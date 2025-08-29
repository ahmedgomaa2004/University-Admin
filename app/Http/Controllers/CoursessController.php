<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class CoursessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = DB::select('SELECT * FROM courses');

        return view("courses.index")->with("courses", $courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("courses.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('courses')->insertGetId([
        'name'     => $request->name,
        'description'       => $request->description,
        'cost'   => $request->cost,
        'hours'    => $request->hours
        ]);

        return redirect()->back()->with('success', 'Course added successfully');
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
        $course = DB::table('courses')->where('id', $id)->first();
        return view('courses.edit')->with('courses', $course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('courses')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'cost' => $request->input('cost'),
                'hours'=> $request->input('hours')
        ]);
        return redirect()->route("courses.index")->with('success','Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('courses')->where('id', $id)->delete();

        return redirect()->route("courses.index")->with('success','Course deleted successfully');
    }
}
