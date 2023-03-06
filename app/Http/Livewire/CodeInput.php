<?php

namespace App\Http\Livewire;

use App\Models\Datos;
use App\Models\Images;
use App\Models\Token;
use Livewire\Component;
use Psy\Readline\Hoa\Console;

use function PHPUnit\Framework\callback;

class CodeInput extends Component
{
    public $code;
    public $cedula;
    
    public function render()
    {
        $uno   = Token::where('token', $this->code )->get();
        $datos = Datos::where('cedula',$this->cedula)->get();    
        $img   = Images::where('datos_id', $this->cedula)->get();
       
        if($uno && $datos){
            return view('livewire.code-input',compact('uno','datos','img'));
        }else{                  
           return view('livewire.code-input');
        }
        
    }

   

}
