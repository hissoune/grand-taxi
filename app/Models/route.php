<?php

namespace App\Models;

use App\Models\city;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class route extends Model
{
    use HasFactory;

    public function startcity()
    {
        return $this->belongsTo(city::class, 'startcity_id');
    }
    public function endcity()
    {
        return $this->belongsTo(city::class, 'endcity_id');
    }
}
