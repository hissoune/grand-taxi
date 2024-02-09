<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class driver_taxi extends Model
{
    use HasFactory,SoftDeletes;



    public function user()
    {
        return $this->belongsTo(User::class, 'oner_id');
    }
}
