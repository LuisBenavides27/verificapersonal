    <div class="container mx-auto">
        <label for="">Digite el token</label>
      
        <x-jet-input wire:model="code" type="text" class="mt-1 block w-full" placeholder="Ingrese el Token" />
        <br><br>
        <label>Digite la Cedula</label>
        <x-jet-input wire:model="cedula" type="text" class="mt-1 block w-full" placeholder="Ingrese Numero de cedula" /> 
        <br><br> 
        @if ($datos->count()>0 && $uno->count()>0) 

            <div class="card-body">
                        @foreach ($datos as $item)   
                            @foreach ($uno as $it) 
                            
                                    @if ($it->user_id == $item->user_id)
                                        <h1>DATOS PERSONALES</h1>
                                        <br>                  
                                    <div class="row">
                                            
                                            @if($img->count()>0)
                                                @foreach ($img as $imagen)                                                                       
                                                <div class="col sm:col-span-4">
                                                    <img  src=" {{ asset ('storage/'.$imagen->url)}}" >                                       
                                                </div>
                                                @endforeach
                                            @else
                                                <div class="col sm:col-span-4">
                                                    <img  src=" {{ asset ('storage/fondos/per.png')}}" >                                       
                                                </div>
                                            @endif        

                                            <div class="col sm:col-span-4">
                                                <x-jet-label for="cedula" value="{{ __('Cedula') }}" />
                                                <x-jet-input id="cedula" type="text" class="mt-1 block w-full"  value="{{$item->cedula}}" readonly/>
                                                    <br>                                        
                                                <x-jet-label for="nombres" value="{{ __('Nombres') }}" />
                                                <x-jet-input id="nombres" type="text" class="mt-1 block w-full"  value="{{$item->nombres}}" readonly/>                                                    
                                                    <br>                                        
                                                <x-jet-label for="cedula" value="{{ __('Cedula') }}" />
                                                <x-jet-input id="cedula" type="text" class="mt-1 block w-full"  value="{{$item->cedula}}" readonly/> 
                                                    <br>
                                                   
                                                <x-jet-label for="sexo" value="{{ __('Sexo') }}" />
                                                <x-jet-input id="sexo" type="text" class="mt-1 block w-full"  value="{{$item->sexo}}" readonly/> 
                                                                               
                                            </div> 
                                            <div class="col sm:col-span-4">
                                                <x-jet-label for="fecha_nacimiento" value="{{ __('Fecha de nacimiento') }}" />
                                                <x-jet-input id="fecha_nacimiento" type="date" class="mt-1 block w-full"  value="{{$item->fecha_nacimiento}}" readonly/> 
                                                    <br>
                                                <x-jet-label for="fecha_expedicion" value="{{ __('Fecha de expedicion') }}" />
                                                <x-jet-input id="fecha_expedicion" type="date" class="mt-1 block w-full"  value="{{$item->fecha_expedicion}}" readonly/>
                                                    <br>
                                                <x-jet-label for="Grupo_Sanguineo" value="{{ __('Grupo Sanguineo') }}" />
                                                <x-jet-input id="Grupo_Sanguineo" type="text" class="mt-1 block w-full"  value="{{$item->Grupo_Sanguineo}}" readonly/>                                    
                                            </div> 
                                                                        
                                            <div class="col sm:col-span-4">
                                                <x-jet-label for="cargo" value="{{ __('Cargo') }}" />
                                                <x-jet-input id="cargo" type="text" class="mt-1 block w-full"  value="{{$item->cargo}}" readonly/>  
                                                    <br>
                                                <x-jet-label for="lugar_nacimiento" value="{{ __('Lugar de nacimiento') }}" />
                                                <x-jet-input id="lugar_nacimiento" type="text" class="mt-1 block w-full"  value="{{$item->lugar_nacimiento}}" readonly/>
                                                    <br>
                                                <x-jet-label for="altura" value="{{ __('Altura') }}" />
                                                <x-jet-input id="altura" type="text" class="mt-1 block w-full"  value="{{$item->altura}} cm" readonly/>                                      
                                            </div>  
                                            
                                        </div>                              
                                        
                                    @endif                                              
                                                
                            @endforeach
                        @endforeach   
            </div>  

        @elseif(($datos->count()==0 && $uno->count()==0) || $datos!=null || $uno!=null )

            <div class="card-body">
                <strong>Aun no a digitado token y cedula o los registros no son correctos</strong>
            </div>    
            
        @endif 
        
</div>