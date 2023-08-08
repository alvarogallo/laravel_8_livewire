<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepollaPaquete extends Model
{
    protected $table = 'repolla_paquetes';
    
    protected $fillable = ['id_paquete', 'cadena'];

    public function nombre(){
        return $this->belongsTo(RepollaPaqueteNombre::class, 'id_paquete');
    }
}
