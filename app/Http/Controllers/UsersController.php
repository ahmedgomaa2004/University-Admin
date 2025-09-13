<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Models\User;

class UsersController extends Controller
{

    public function __construct()
{
    $this->middleware(['auth', 'verified']);

    $this->middleware(function ($request, $next) {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }
        return $next($request);
    });
}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view("users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view("users.create")->with("users", $users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->back()->with("success","User Add successfully");
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
        $user = User::find($id);
        return view("users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
            $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role]);

        return redirect()->route("users.index")->with("success","User updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route("users.index")->with("success","User deleted successfully");
    }
}
