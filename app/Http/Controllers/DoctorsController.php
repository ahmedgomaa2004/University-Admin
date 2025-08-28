<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = DB::select('SELECT * FROM doctors');

        return view('doctors.index' )->with('doctors', $doctors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        DB::table('doctors')->insert([
        'name'    => $request->input('name'),
        'age'     => $request->input('age'),
        'address' => $request->input('address'),
        'gender'  => $request->input('gender'),
        'salary'  => $request->input('salary'),]);

        return redirect()->back()->with('success', 'Doctor added successfully');

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
    public function edit($id)
    {
        $doctors = DB::table('doctors')->where('id', $id)->first();

        return view('doctors.edit')->with('doctors', $doctors);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::table('doctors')
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
        DB::table('doctors')->where('id', $id)->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }
}
