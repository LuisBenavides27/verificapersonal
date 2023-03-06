<?php

namespace App\Http\Livewire;

use Illuminate\Console\View\Components\Alert;
use Livewire\Component;

class Generador extends Component
{
    public $token;
 
    public function increment()
    
    {
      //  $this->token = Str::random(20);
    }

    public function render()
    {
        return view('livewire.generador');
    }

}
