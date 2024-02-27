<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\User;
use App\Models\route;
use App\Models\horaires;
use App\Models\driver_taxi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Cache\RateLimiting\Limit;

class dasboardController extends Controller
{
    public function index()
    {
        $citys=city::all();
        $passagers = User::whereHas('roles', function ($query) {
            $query->where('name', 'passager');
       })->get();
       $drivers = driver_taxi::where('deleted_at',null)->get();
        $routes=route::all();
        $horrs = horaires::select('horaires.*', DB::raw('COUNT(reservationns.id) as reservation_count'))
        ->join('reservationns', 'reservationns.horaire_id', '=', 'horaires.id')
        ->join('driver_taxis', 'driver_taxis.id', '=', 'horaires.driver_taxi_id')
        ->where('driver_taxis.deleted_at',null)
        ->groupBy('horaires.id')
        ->groupBy('horaires.route') 
        ->orderByDesc('reservation_count')
        ->limit(5)
        ->get();
  
        
            return view('dashboard',compact('routes','horrs','passagers','drivers','citys'));
    }
    public function search(Request $request)
    {
        $rout = (int) $request->input('route');
        
        $horrs = horaires::select('horaires.*', DB::raw('COUNT(reservationns.id) as reservation_count'))
        ->join('reservationns', 'reservationns.horaire_id', '=', 'horaires.id')
        ->join('driver_taxis', 'driver_taxis.id', '=', 'horaires.driver_taxi_id')
        ->where('driver_taxis.deleted_at',null)
        ->groupBy('horaires.id')
        ->groupBy('horaires.route') 
        ->orderByDesc('reservation_count')
        ->limit(5)
        ->get();
        $hors = horaires::join('driver_taxis', 'driver_taxis.id', '=', 'horaires.driver_taxi_id')
        ->where('driver_taxis.status', 'disponible')
        ->where('driver_taxis.deleted_at',null)
        ->where('horaires.route',$request->input('route'))
        ->select('horaires.*')
        ->get();
        $routes=route::all();
        return view('dashboard',compact('hors','routes','horrs','rout'));
    }
    public function filter(Request $request)
    {
        $rout=$request->input('route');
        
        if($request->input('price')){
        $horrs = horaires::select('horaires.*', DB::raw('COUNT(reservationns.id) as reservation_count'))
        ->join('reservationns', 'reservationns.horaire_id', '=', 'horaires.id')
        ->join('driver_taxis', 'driver_taxis.id', '=', 'horaires.driver_taxi_id')
        ->where('driver_taxis.deleted_at',null)
        ->groupBy('horaires.id')
        ->groupBy('horaires.route') 
        ->orderByDesc('reservation_count')
        ->limit(5)
        ->get();
        $hors = horaires::join('driver_taxis', 'driver_taxis.id', '=', 'horaires.driver_taxi_id')
        ->where('driver_taxis.status', 'disponible')
        ->where('driver_taxis.deleted_at',null)
        ->where('horaires.route',$request->input('route'))
        ->select('horaires.*')
        ->orderBy('horaires.price', 'asc')
        ->get();
        $routes=route::all();
        return view('dashboard',compact('hors','routes','horrs','rout'));
    }elseif($request->input('rate')){

        $horrs = horaires::select('horaires.*', DB::raw('COUNT(reservationns.id) as reservation_count'))
        ->join('reservationns', 'reservationns.horaire_id', '=', 'horaires.id')
        ->join('driver_taxis', 'driver_taxis.id', '=', 'horaires.driver_taxi_id')
        ->where('driver_taxis.deleted_at',null)
        ->groupBy('horaires.id')
        ->groupBy('horaires.route') 
        ->orderByDesc('reservation_count')
        ->limit(5)
        ->get();
        $hors = horaires::join('driver_taxis', 'driver_taxis.id', '=', 'horaires.driver_taxi_id')
        ->join('rates' ,'rates.driver_taxi_id','=','driver_taxis.id')
        ->where('driver_taxis.status', 'disponible')
        ->where('driver_taxis.deleted_at',null)
        ->where('horaires.route',$request->input('route'))
        ->select('horaires.*')
        ->orderBy('rates.rate','desc')
        ->get();
        $routes=route::all();
        return view('dashboard',compact('hors','routes','horrs','rout'));

    }
    }
}
