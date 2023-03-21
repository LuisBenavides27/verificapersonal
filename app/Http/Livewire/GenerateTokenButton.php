<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Token;

class GenerateTokenButton extends Component
{
    public $token;
    public $ide;
    
    public function generateToken()
    {
        //$ide = auth()->user()->id;
        $this->token = Str::random(8);
        Token::create(['token' => $this->token, 'user_id' => auth()->user()->id]);

    }


    public function render()
    {
        return view('livewire.generate-token-button');
    }
}

