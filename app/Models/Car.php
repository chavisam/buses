<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'plazas',

    ];

    
    public function paradas(){
        return $this->hasMany(Parada::class);
    }
}
