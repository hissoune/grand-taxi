<?php

namespace App\Http\Controllers;

use App\Models\route;
use App\Models\horaires;
use App\Models\driver_taxi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Psy\Command\WhereamiCommand;

class DriverTaxiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
          
        
    
        $driver = driver_taxi::where('user_id', Auth::id())->first();
        if ($driver) {
            $hor = horaires::where('driver_taxi_id', $driver->id)->get();
            return view('Chaufeur.index', compact('driver', 'hor'));
        } else {
            return view('Chaufeur.index',compact('driver')); 
        }

        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('Chaufeur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated=  $request->validate([
           'user_id'=> 'required',
           'image'=> 'required',
            'number_seats' => 'required|integer',
            'typ_vehicle' => 'required|string',
            'matricule' => 'required|integer',
            'method_payment' => 'required|in:cart,espase',
            'description' => 'required|string',
        ]);
        if($request->hasFile('image')){
            $validated['image']=$request->file('image')->store('driveimges','public');
            
        }   
       
       $driver= driver_taxi::create([
            'User_id'=>$validated['user_id'],
            'number_seets'=>$validated['number_seats'],
            'typ_veicl'=>$validated['typ_vehicle'],
            'matricule'=>$validated['matricule'],
            'image'=>$validated['image'],
            'method_payment'=>$validated['method_payment'],
            'description'=>$validated['description'],
        ]);
     
        return redirect(route('Chaufeur.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(driver_taxi $driver_taxi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(driver_taxi $item)
    {
        dd($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, driver_taxi $item)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(driver_taxi $driver_taxi)
    {
        //
    }
}
