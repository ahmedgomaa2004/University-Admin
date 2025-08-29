<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = DB::table("departments")->get();

        return view("departments.index")->with("departments", $departments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("departments.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('departments')->insert([
        'name'    => $request->input('name'),
        'description'     => $request->input('description')]);

        return redirect()->route('departments.create')->with('success','Department added successfully');
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
        $department = DB::table('departments')->where('id', $id)->first();
        return view('departments.edit')->with('department', $department);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('departments')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'description' => $request->input('description')]);

        return redirect()->route('departments.index')->with('success','Department updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('departments')->where('id', $id)->delete();
        return redirect()->back()->with('success','Department deleted successfully');
    }
}
