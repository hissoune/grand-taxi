<?php

namespace App\Http\Controllers;

use App\Models\rate;
use App\Models\User;
use App\Models\horaires;
use App\Models\driver_taxi;
use App\Models\reservationn;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $passagers = User::whereHas('roles', function ($query) {
             $query->where('name', 'passager');
        })->get();
        $drivers = driver_taxi::where('deleted_at',null)->get();
      
        return view('admin.index',compact('passagers','drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        $admin->delete();
           return  redirect(route('admin.index'));
}
}