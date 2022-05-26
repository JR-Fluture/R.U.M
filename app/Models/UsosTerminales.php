<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsosTerminales extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'create_at', 'update_at'];

    //Relacion uno a muchos inversa
    public function sim()
    {
        return $this->belongsTo(Sim::class);
    }

    //Relacion uno a muchos inversa
    public function terminal()
    {
        return $this->belongsTo(Terminales::class);
    }

    //Relacion uno a muchos inversa
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    //Relacion uno a muchos
    public function incidencia_terminal()
    {
        return $this->hasMany(IncidenciasTerminales::class);
    }
}
