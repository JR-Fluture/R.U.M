<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    use HasFactory;
    protected $guarded = ['id','create_at','update_at'];

    //Relacion uno a muchos inversa
    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }

    //Relacion uno a muchos inversa
    public function tipo_linea()
    {
        return $this->belongsTo(TiposLineas::class);
    }

    //Relacion uno a muchos
    public function sim(){
        return $this->hasMany(Sim::class);
    }
}
