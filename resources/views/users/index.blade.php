<x-app-layout>
 
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <h1>LISTADO DE USUARIOS REGISTRADOS</h1>
              <br><br>
              @if (session('info'))
                  <div class="alert alert-success">
                      <strong>
                        {{ session('info') }} 
                      </strong>
                  </div>
                @endif

                @if (session('danger'))
                <div class="alert alert-danger">
                    <strong>
                      {{ session('danger') }} 
                    </strong>
                </div>
              @endif

              @livewire('users.users-index')
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