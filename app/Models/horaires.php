<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horaires extends Model
{
    use HasFactory;
    protected $fillable=[
      
        'route',
        'price',
        'driver_taxi_id',
    ];

    public function driver_taxi()
{
    return $this->belongsTo(driver_taxi::class,'driver_taxi_id');
}
public function routes()
    {
        return $this->belongsTo(route::class, 'route');
    } 

}
