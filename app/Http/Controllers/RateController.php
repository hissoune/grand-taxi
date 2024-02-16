<?php

namespace App\Http\Controllers;

use App\Models\rate;
use App\Models\User;
use App\Models\driver_taxi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $rates= rate::join('driver_taxis','rates.driver_taxi_id','=','driver_taxis.id')->join('users','users.id','=','driver_taxis.user_id')->where('driver_taxis.user_id',Auth::id())->get();
       return view('rate.index',compact('rates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addRate(driver_taxi $rate)
    {
        $user=User::where('id',Auth::id())->first();
       
        return view('rate.create',compact('rate','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createRate(Request $request)
    {     $request->validate([
        'user_id' => 'required|exists:users,id',
        'driver_taxi_id' => 'required|exists:driver_taxis,id',
        'rate' => 'required|integer|min:1|max:10',
        'comment' => 'required|string|max:255',
    ]);
    rate::create([
        'user_id' =>$request->user_id,
        'driver_taxi_id' =>$request->driver_taxi_id,
        'rate' =>$request->rate,
        'comment' =>$request->comment,
    ]);
          return redirect(route('dashboard'))->with('success','thank you for rate');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(rate $rate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rate $rate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rate $rate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rate $rate)
    {
        //
    }
}
