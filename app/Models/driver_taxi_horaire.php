<?php

namespace App\Models;

use App\Models\horire;
use App\Models\driver_taxi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class driver_taxi_horaire extends Model
{
    use HasFactory;
    protected $fillable = [
    
        'horaire_id',
        'driver_taxi_id',
       
    ];

    
   

}
