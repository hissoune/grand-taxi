<?php

namespace App\Http\Controllers;

use App\Models\route;
use App\Models\horaires;
use Illuminate\Http\Request;
use App\Models\driver_taxi;
use Illuminate\Support\Facades\Auth;

class horairesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hors = horaires::where('status', 'disponible')->orderBy('created_at', 'desc')->get();
       
       return view('passager.index',compact('hors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    
        $driver = driver_taxi::where('user_id', Auth::id())->first();
// dd($driver);
// $dd=Auth::id();
//         $driver=driver_taxi::find($dd);
        // dd($driver);
        $Routes=route::all();
        return view('horaire.create',compact('Routes','driver'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'route' => 'required',
            'price' => 'required|numeric',
            'driver_id'=>'required',
        ]);
        horaires::create([
    'route'=>$request->route,
    'driver_taxi_id'=>$request->driver_id,
    'price' =>$request->price,

        ]);
        return redirect(route('Chaufeur.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(horaires $horire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(horaires $horire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   // horairesController.php
public function update(Request $request, horaires $Horaire)
{
//     $horcreated=$Horaire->created_at;
//     $hordvr=driver_taxi_horaire::where('horaires.created_at','=',$horcreated)  
//      ->join('horaires', 'horaires.id', '=', 'driver_taxi_horaires.horaire_id')->get();
// dd($hordvr);
//     $hordvr->update(['status' => $request->has('status') ? 'Disponible' : 'out of service']);

//     return redirect()->back(); 
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(horaires $horire)
    {
        //
    }
}
