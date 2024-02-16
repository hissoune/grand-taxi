<?php

namespace App\Http\Controllers;

use App\Models\route;
use App\Models\horaires;
use App\Models\driver_taxi;
use App\Models\reservationn;
use Illuminate\Http\Request;
use Psy\Command\WhereamiCommand;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class DriverTaxiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
          
        
    
        $driver_taxi = driver_taxi::where('user_id', Auth::id())->first();
        if ($driver_taxi) {
            $hor = horaires::where('driver_taxi_id', $driver_taxi->id)->get();
            // $reservations=reservationn::join('horaires','horaire_id','=','horaires.id')
            // ->join('driver_taxis','horaires.driver_taxi_id','=','driver_taxis.id')
            // ->where('driver_taxi_id',$driver_taxi->id)->get();
            // $reserv=count($reservations);
           
            return view('Chaufeur.index', compact('driver_taxi', 'hor'));
        } else {
            return view('Chaufeur.index',compact('driver_taxi')); 
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
            'number_seats' => 'required|integer|max:6',
            'typ_vehicle' => 'required|string',
            'matricule' => 'required|integer',
            'method_payment' => 'required|in:cart,espase',
            'description' => 'required|string|',
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
    public function edit(driver_taxi $driver_taxi)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, driver_taxi $Chaufeur)
    {
        
        if ($Chaufeur) {
            $Chaufeur->status = $request->input('status');
            $Chaufeur->save();
        
            return redirect()->route('Chaufeur.index')->with('success', 'Status updated successfully');
        } else {
            return redirect()->route('Chaufeur.index')->with('error', 'Driver not found');
        }
        


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(driver_taxi $driver_taxi)
    {
        //
    }
}
