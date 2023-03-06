<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    
    protected $fillable = ['url','datos_id'];

            //Relacion de uno a uno inversa Images - Datos

    public function datos(){
                return $this->belongsTo(Datos::class);
    }
    
}
