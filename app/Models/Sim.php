<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sim extends Model
{
    use HasFactory;
    protected $guarded = ['id','create_at','update_at'];

    //Relacion uno a muchos inversa
    public function linea()
    {
        return $this->belongsTo(Linea::class);
    }

    //Relacion uno a muchos inversa
    public function formato_sim()
    {
        return $this->belongsTo(FormatosSims::class);
    }

    //Relacion uno a muchos
    public function uso_terminal(){
        return $this->hasMany(UsosTerminales::class);
    }
}
