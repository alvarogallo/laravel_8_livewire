<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class RepollaPaquetesNombre extends Model
{
    protected $table = 'repolla_paquetes_nombre';
    
    protected $fillable = ['nombre'];

    public function paquetes()
    {
        return $this->hasMany(RepollaPaquete::class, 'id_paquete');
    }
}
