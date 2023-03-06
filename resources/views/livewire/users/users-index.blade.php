<div>
  <div class="card" align="center">

    <div class="card-header">
        <input class="form-control" wire:model="search" placeholder="ingrese nombre de usuario a buscar">
    </div>
    

    @if ($users->count())
    

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th> Id </th>
                        <th > Nombre </th>
                        <th> Email </th>
                        <th> Rol </th>
                                           
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td >{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>  
                            @if($user->hasRole('Admin'))
                                <p>Admin</p>
                            @elseif($user->hasRole('Recaudador')) 
                                <p>Empleado</p> 
                            @elseif($user->hasRole('Punto')) 
                                <p>Punto</p>
                            @else
                                <p>Sin Asignar</p>
                            @endif
                        </td>
                        <td width="10px">
                            <a class="btn btn-outline-primary" href="{{route('users.edit', $user)}}">Add Rol</a>
                        </td>
                        <td width="10px">
                            <a class="btn btn-outline-warning" href="{{route('users.reset', $user)}}">Reset Pass</a>
                        </td>
                        @if ($user->hasRole('Recaudador'))
                            <td width="10px">
                                <a class="btn btn-outline-success" href="{{route('users.show', $user)}}">Ad/Ed Datos</a>
                            </td>                                                
                            <td width="10px">
                                <a class="btn btn-outline-info" href="{{route('datos.imagen', $user)}}">Ad/Ed Foto</a>
                            </td>
                        @endif                            
                        <td width="10px">
                            <form action="{{route('users.destroy', $user)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" >Del user</button>
                            </form>
                        </td> 
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$users->links()}}
        </div>
    @else
            <div class="card-body">
            <strong>No existen registros con ese nombre</strong>
            </div>    
    @endif
  </div>
</div>
