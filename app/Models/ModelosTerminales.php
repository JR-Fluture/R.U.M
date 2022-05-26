<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelosTerminales extends Model
{
    use HasFactory;
    protected $guarded = ['id','create_at','update_at'];

    //Relacion uno a muchos inversa
    public function marca_terminal()
    {
        return $this->belongsTo(MarcasTerminales::class);
    }

    //Relacion uno a muchos inversa
    public function tipo_terminal()
    {
        return $this->belongsTo(TiposTerminales::class);
    }

    //Relacion uno a muchos inversa
    public function tipo_cargador()
    {
        return $this->belongsTo(TiposCargadores::class);
    }

    //Relacion uno a muchos
    public function terminal(){
        return $this->hasMany(Terminales::class);
    }
}
