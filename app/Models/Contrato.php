<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    protected $guarded = ['id','create_at','update_at'];

    //Relacion uno a muchos inversa
    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class);
    }

    //Relacion uno a muchos
    public function linea(){
        return $this->hasMany(Linea::class);
    }
}
