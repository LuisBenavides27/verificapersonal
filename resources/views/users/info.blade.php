<x-app-layout>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>EDITAR LOS DATOS DEL USUARIO</h1>
                <br><br>
                <div class="card-body">

                    @foreach ($info as $item)
                        
                        <form method="POST" action="{{ route('users.actualizar') }}">

                            @csrf
                            
                                <div class="form-row col">
                                                                                                                                    
                                    <div class="col sm:col-span-4">
                                        <x-jet-label for="nombres" value="{{ __('Nombres') }}" />
                                        <x-jet-input name="nombres" :value="old('nombres')" type="text" class="mt-1 block w-full" value="{{ $item->nombres}}" required/>                            
                                        @error('nombres')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror                                           
                                    </div>
                                
                                    <div class="col sm:col-span-4">
                                        <x-jet-label for="cedula" value="{{ __('Cedula') }}" />
                                        <x-jet-input name="cedula" :value="old('cedula')" type="text" class="mt-1 block w-full" value="{{ $item->cedula}}" required readonly/>
                                        @error('cedula')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror                                         
                                    </div> 
            
                                    <div class="col sm:col-span-4">
                                        <x-jet-label for="cargo" value="{{ __('Cargo') }}" />
                                        <x-jet-input name="cargo" :value="old('cargo')" type="text" class="mt-1 block w-full" value="{{ $item->cargo}}" required/>
                                        @error('cargo')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror                                         
                                    </div>
                                    
                                </div>
            
                                <br>
                                <div class="form-row col">
                                                                                                                                    
                                    <div class="col sm:col-span-4">
                                        <x-jet-label for="fecha_expedicion" value="{{ __('Fecha de expedicion') }}" />
                                        <x-jet-input name="fecha_expedicion" :value="old('fecha_expedicion')" type="date" class="mt-1 block w-full" value="{{ $item->fecha_expedicion}}" required />
                                        @error('fecha_expedicion')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror                                            
                                    </div>
                                
                                    <div class="col sm:col-span-4">
                                        <x-jet-label for="altura" value="{{ __('Altura') }}" />
                                        <x-jet-input name="altura" :value="old('altura')" type="number" class="mt-1 block w-full" value="{{ $item->altura}}" required />
                                        @error('altura')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror                                          
                                    </div> 
            
                                    <div class="col sm:col-span-4">
                                        <x-jet-label for="sexo" value="{{ __('Sexo') }}" />
                                        <x-jet-input name="sexo" :value="old('sexo')" type="text" class="mt-1 block w-full" value="{{ $item->sexo}}" required />
                                        @error('sexo')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror                                              
                                    </div>                                                  
                                </div>
            
                                <br>
                                <div class="form-row col">
            
                                    <div class="col sm:col-span-4">
                                        <x-jet-label for="lugar_nacimiento" value="{{ __('Lugar de nacimiento') }}" />
                                        <x-jet-input name="lugar_nacimiento" :value="old('lugar_nacimiento')" value="{{ $item->sexo}}" type="text" class="mt-1 block w-full"  required/> 
                                        @error('lugar_nacimiento')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror                                        
                                    </div>  
            
                                    <div class="col sm:col-span-4">
                                        <x-jet-label for="Grupo_Sanguineo" value="{{ __('Grupo Sanguineo') }}" />
                                        <x-jet-input name="Grupo_Sanguineo" :value="old('Grupo_Sanguineo')" type="text" class="mt-1 block w-full" value="{{ $item->Grupo_Sanguineo}}" required/> 
                                        @error('Grupo_Sanguineo')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror                                          
                                    </div>    
                                    
                                    <div class="col sm:col-span-4">
                                        <x-jet-label for="fecha_nacimiento" value="{{ __('Fecha de nacimiento') }}" />
                                        <x-jet-input name="fecha_nacimiento" :value="old('fecha_nacimiento')" type="date" class="mt-1 block w-full" value="{{ $item->fecha_nacimiento}}" required />
                                        @error('fecha_nacimiento')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror                                         
                                    </div> 
                                                        
                                
                                </div>
                        
                                <br>
                                <x-jet-button type="submit">Actualizar datos</x-jet-button>

                            </form>
                        @endforeach

                
                    </div>
                
                <br><br>
            </div>
        </div>
    </div>
</x-app-layout>
<style>
    h1{
        font-variant: Cambria;
        font-size: 50px;
        text-align: center;
    }

</style>