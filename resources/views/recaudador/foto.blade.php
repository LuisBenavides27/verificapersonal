<x-app-layout>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>ESTA ES LA IMAGEN ACTUAL DEL PERFIL </h1>
                <br><br>
                
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col">                
                                    <img id="picture" class="img-perfil" src="{{ asset ('storage/'.$imagen[0]['url'])}}">
                            </div>   
                                <div class="col">
                                    <div class="form-group">
                                        <form action="{{route('datos.foto')}}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        
                                            <x-jet-label for="file" value="{{ __('Imagen de perfil') }}"/>
                                            <br>
                                            <x-jet-input name="file" id="file" class="form-control-file" type="file" required/>
                                            <br>
                                            @error('file')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror 
                                            <br>
                                             <x-jet-input name="datos_id" type="hidden" value="{{$imagen[0]['id']}}"/> 
                                            <button class="btn btn-primary btn-lg btn-block">
                                                {{ __('Actualizar foto') }}
                                            </button>
                                        </form>                                     
                                        
                                    </div>
                                </div>
                
                        </div>
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

    .img-perfil{        
        width: 70%;
        height: 70%;
    }   

</style>
<script>
    document.getElementById("file").addEventListener('change', cambiarImagen);
    function cambiarImagen(event){
        var file = event.target.files[0];

        var reader = new FileReader();
        reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
        };
        
        reader.readAsDataURL(file);
    }
</script>