<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class driver_taxi extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
    
        'User_id',
        'route',
        'number_seets',
        'typ_veicl',
        'matricule',
        'price',
        'method_payment',
        'description',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'User_id');
    }

    public function horairs()
    {
        return $this->belongsToMany(horaires::class, 'driver_taxi_horaires', 'driver_taxi_id', 'horaire_id');
    }
    
}
