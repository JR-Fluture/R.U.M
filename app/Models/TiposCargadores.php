<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposCargadores extends Model
{
    use HasFactory;
    protected $guarded = ['id','create_at','update_at'];

    //Relacion uno a muchos
    public function modelo_terminal(){
        return $this->hasMany(ModelosTerminales::class);
    }
}
