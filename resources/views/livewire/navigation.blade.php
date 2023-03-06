<nav class="bg-gray-800" x-data="{ open: false }">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">

<!-- Mobile menu button-->
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          
          <button x-on:click="open = true" type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none 
          focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
           
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>


        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">

          <!-- Logotipo -->
          <a  href="/" class="flex flex-shrink-0 items-center">
            <img class="block h-8 w-auto lg:hidden" src="{{asset('storage/fondos/SuperGIROS.png')}}" >
            <img class="hidden h-8 w-auto lg:block" src="{{asset('storage/fondos/SuperGIROS.png')}}" >
          </a>

          <div class="hidden sm:ml-6 sm:block">
            @auth
            <div class="flex space-x-4">      


              @can('recaudador.token')
                <a href="{{route('recaudador.token')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Token</a>   
              @endcan
              
              @can('punto.datos')
                <a href="{{route('punto.datos')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Validar</a>
              @endcan
              
              @can('users.index')
                <a href="{{route('users.index')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Usuarios</a>
              @endcan

             {{--  @can('users.nuevo')
                <a href="{{route('users.nuevo')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Agregar Usuarios</a>
              @endcan --}}

              
            </div>
            @endauth
          </div>
        </div>


        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <button type="button" class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 
          focus:ring-offset-gray-800">         
          </button>
  

          <!-- Profile dropdown -->
          @auth
              
            <div class="relative ml-3" x-data="{ open: false }">
              <div>
                <button x-on:click="open = true" type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white 
                focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">                
                  <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="">
                </button>
              </div>
    
              <div x-show="open" x-on:click.away="open=false" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 
              shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                {{-- @can('profile.show') --}}
                  <a href="{{route('profile.show')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Perfil</a>
                {{-- @endcan --}}
                
                <form method="POST" action="{{ route('logout') }}" x-data>
                  @csrf
                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700"
                role="menuitem" tabindex="-1" id="user-menu-item-2" 
                @click.prevent="$root.submit();">
                Cerrar Sesion</a>
                </form>
              </div>
            </div>

          @else
          
              <a href="{{route('login')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white 
              px-3 py-2 rounded-md text-sm font-medium">
              Login
              </a>
          
          @endauth

        </div>
      </div>
    </div>
  
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu" x-show="open" x-on:click.away=" open = false">
      @auth
      <div class="space-y-1 px-2 pt-2 pb-3">
        @can('recaudador.token')
          <a href="{{route('recaudador.token')}}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Token</a> 
        @endcan        
           @can('punto.datos')
            <a href="{{route('punto.datos')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Validar</a>
           @endcan
        @can('users.index')
        <a href="{{route('users.index')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Usuarios</a>
        @endcan
        
      </div>
      @endauth
    </div>
  </nav>