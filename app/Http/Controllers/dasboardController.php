<?php

namespace App\Http\Controllers;

use App\Models\route;
use App\Models\horaires;
use Illuminate\Http\Request;

class dasboardController extends Controller
{
    public function index()
    {
        $route=route::all();
        return view('dashboard',compact('route'));
    }
    public function search(Request $request)
    {
        $hors = horaires::join('driver_taxis', 'driver_taxis.id', '=', 'horaires.driver_taxi_id')
        ->where('driver_taxis.status', 'disponible')
        ->where('horaires.route',$request->input('route'))
        ->select('horaires.*')
        ->get();
        $route=route::all();
        return view('dashboard',compact('hors','route'));
    }
    
}
