<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $guarded = ['id','create_at','update_at'];

    //Relacion uno a muchos inversa
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    //Relacion uno a muchos
    public function uso_terminal()
    {
        return $this->hasMany(UsosTerminales::class);
    }

    //Relacion uno a muchos
    public function uso_pc()
    {
        return $this->hasMany(UsosPc::class);
    }

    //Relacion muchos a muchos
    public function impresora()
    {
        return $this->belongsToMany(Impresora::class);
    }
}
