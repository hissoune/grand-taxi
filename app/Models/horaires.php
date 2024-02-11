<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horaires extends Model
{
    use HasFactory;
    protected $fillable=[
        'status',
    ];

    public function drivert()
{
    return $this->belongsToMany(driver_taxi::class, 'driver_taxi_horaires', 'horaire_id', 'driver_taxi_id');
}

}
