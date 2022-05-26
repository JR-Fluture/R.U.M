<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pc extends Model
{
    use HasFactory;
    protected $guarded = ['id','create_at','update_at'];

    //Relacion uno a muchos
    public function uso_pc()
    {
        return $this->hasMany(UsosPc::class);
    }
}
