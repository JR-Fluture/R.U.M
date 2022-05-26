<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsosPc extends Model
{
    use HasFactory;
    protected $guarded = ['id','create_at','update_at'];

    //Relacion uno a muchos inversa
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
    public function monitor()
    {
        return $this->belongsTo(Monitores::class);
    }
    public function pc()
    {
        return $this->belongsTo(Pc::class);
    }

    //Relacion uno a muchos
    public function incidencia_pc()
    {
        return $this->hasMany(IncidenciasPc::class);
    }
}
