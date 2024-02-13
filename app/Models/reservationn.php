<?php

namespace App\Models;

use App\Models\User;
use App\Models\horaires;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class reservationn extends Model
{
    use HasFactory;

    protected $fillable=[
'horaire_id',
'users_id'
    ];
    public function users()
    {
        return $this->belongsTo(User::class,'Users_id');
    } 
    public function horaires()
    {
        return $this->belongsTo(horaires::class, 'horaire_id');
    } 
}
