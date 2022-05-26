<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $guarded = ['create_at','update_at'];

    //Relacion uno a muchos
    public function persona()
    {
        return $this->hasMany(Persona::class);
    }
}
