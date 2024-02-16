<?php

namespace App\Http\Controllers;

use App\Models\route;
use App\Models\horaires;
use App\Models\driver_taxi;
use App\Models\reservationn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class horairesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hors = horaires::join('driver_taxis', 'driver_taxis.id', '=', 'horaires.driver_taxi_id')
        ->where('driver_taxis.status', 'disponible')
        ->where('driver_taxis.deleted_at',null)
        ->where('horaires.disable',false)
        ->orderBy('horaires.created_at', 'desc')
        ->select('horaires.*')
        ->get();
    
    
        //   dd($hors);
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
  
    if($Horaire->disable==false){
        $Horaire->disable=true;
        $Horaire->save();
        $reservations=reservationn::where('horaire_id',$Horaire->id)->get();
        foreach($reservations as $reserv){
            $reserv->delete();
            // $reserv->save();
        }
        return redirect(route('Chaufeur.index'));
    }else{
        $Horaire->disable=false;
        $Horaire->created_at=now();

        $Horaire->save();
        return redirect(route('Chaufeur.index'));
    }

}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(horaires $horire)
    {
        //
    }
}
