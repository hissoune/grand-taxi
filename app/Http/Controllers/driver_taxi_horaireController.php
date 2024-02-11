<?php

namespace App\Http\Controllers;

use App\Models\horaire_drivern;
use Illuminate\Http\Request;

class driver_taxi_horaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
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
    public function show(horaire_drivern $horaire_drivern)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(horaire_drivern $horaire_drivern)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,horaire_drivern $item)
{
//    $hhhh= horaire_drivern::find($item);
    dd($item);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(horaire_drivern $horaire_drivern)
    {
        //
    }
}
