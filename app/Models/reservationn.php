<?php

namespace App\Models;

use App\Models\User;
use App\Models\horaires;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class reservationn extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
'horaire_id',
'users_id',
'cancelled',
    ];

    

   
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
   
    // public function users()
    // {
    //     return $this->belongsTo(User::class, 'users_id');
    // }    
    public function horaires()
    {
        return $this->belongsTo(horaires::class, 'horaire_id');
    } 
}
