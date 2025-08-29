<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = DB::select("SELECT e.*, m.name  AS manager_name , d.name AS dname FROM employees e LEFT JOIN employees m ON e.manager_id = m.id LEFT JOIN departments d on e.department_id = d.id");
        return view("employees.index" )->with("employees", $employees);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $depart = DB::select("SELECT * FROM departments");        
        $employees= DB::select("SELECT * FROM employees");
        

        return view("employees.create")->with(["deparements"=> $depart ,"employees" => $employees]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('employees')->insert([
        'name'     => $request->name,
        'age'       => $request->age,
        'address'   => $request->address,
        'gender'    => $request->gender,
        'department_id' => $request->department_id,
        'manager_id' => $request->manager_id,
        ]);

        return redirect()->back()->with('success', 'Employee added successfully');
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
        $depart = DB::select("SELECT * FROM departments");        
        $empl= DB::table('employees')->where('id', $id)->first();
        $employees= DB::select("SELECT * FROM employees");
        

        return view("employees.edit")->with(["deparements"=> $depart ,"employees" => $employees,"empl"=> $empl]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('employees')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'age' => $request->input('age'),
                'address' => $request->input('address'),
                'gender'=> $request->input('gender'),
                'department_id'=> $request->input('department_id'),
                'manager_id'=> $request->input('manager_id'),
                ]);

        return redirect()->route("employees.index")->with('success','Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('employees')->where('id', $id)->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
