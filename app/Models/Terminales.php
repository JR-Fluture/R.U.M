<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminales extends Model
{
    use HasFactory;
    protected $guarded = ['id','create_at','update_at'];

    //Relacion uno a muchos inversa
    public function modelo_terminal()
    {
        return $this->belongsTo(ModelosTerminales::class);
    }

    //Relacion uno a muchos
    public function uso_terminal(){
        return $this->hasMany(UsosTerminales::class);
    }
}
