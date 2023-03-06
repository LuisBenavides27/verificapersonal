<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos extends Model
{
    use HasFactory;

    protected $guarded = ['created_at','updated_at'];
        //Relacion de uno a uno inversa Datos - Users

        public function user(){
            return $this->belongsTo(User::class);
        }

        //Relacion de uno a uno Datos - Imagenes 

        public function images(){
            return $this->hasOne(Images::class);
        }
}
