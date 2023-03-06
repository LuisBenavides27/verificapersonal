<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $fillable = ['token','user_id'];

    //Relacion uno a muchos inversa // Token - User
    public function user(){
        return $this->belongsTo(User::class);
    }
}
