<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parada extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hora_ida',
        'hora_vuelta'
    ];

    public function cars(){
        return $this->belongsToMany(Car::class);
    }
}
