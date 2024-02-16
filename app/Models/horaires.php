<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class horaires extends Model
{
    use HasFactory,SoftDeletes;
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
    public function reservations()
    {
        return $this->hasMany(reservationn::class, 'horaire_id');
    }

}
