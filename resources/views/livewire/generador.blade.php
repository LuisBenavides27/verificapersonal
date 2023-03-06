<div class="card">
{{--     <div class="cent">  
        <x-jet-label>
            Este es el token
        </x-jet-label>
        <br>
        <x-jet-input value="{{ $res }}" readonly>
            
        </x-jet-input>
        
        <br><br>
      <x-jet-button wire:click="increment">
        Generar
      </x-jet-button>

    </div> --}}

    <div>
      <button wire:click="generateToken">Generate Token</button>
      <input type="text" wire:model="token" />
  </div>
  
</div>
