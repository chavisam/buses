<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'hijo_name',
        'fecha',
        'parada_name'
    ];

    public function parada(){
        return $this->hasOne(Parada::class);
    }
}
