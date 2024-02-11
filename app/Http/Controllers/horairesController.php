<?php

namespace App\Http\Controllers;

use App\Models\horaires;
use Illuminate\Http\Request;

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
    // Add logic to update the item based on the request data
    $Horaire->update(['status' => $request->has('status') ? 'Disponible' : 'out of service']);

    return redirect()->back(); 
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(horaires $horire)
    {
        //
    }
}
