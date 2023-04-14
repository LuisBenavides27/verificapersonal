<?php

namespace App\Http\Controllers;

use App\Models\Datos;
use App\Models\Images;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;
use Spatie\Permission\Models\Role;
//use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:users.index');
    }
    
    public function index()
    {
        $has = Role::all();
        return view('users.index',compact('has'));
    }

  
    public function create(User $user)
    {
        return view('users.create',compact('user'));
    }

   
    public function store(Request $request)
    {
       $request->validate([
            'cedula' => 'required|unique:datos|integer',
            'nombres' => 'required',
            'cargo' => 'required',
            'lugar_nacimiento' => 'required',
            'fecha_nacimiento' => 'required|date',
            'fecha_expedicion' => 'required|date',
            'altura' => 'required',
            'sexo' => 'required',
            'Grupo_Sanguineo' => 'required',
            'user_id' => 'required',
        ]);

       $datos = Datos::create($request->all());
       if($datos){
            return redirect()->route('users.index')->with('info','Se ha creado los datos del usuario '.$request->nombres);    
       }else{
         return redirect()->route('users.index')->with('danger','Algo salio mal, intenta registrar otra vez ');    
       }        
       
    }

  
    public function show(User $user)
    {        
        //$name = $user->id;
        $info = Datos::where('user_id',$user->id)->get();
      //  $name = $name->count();
        if($info->count()){
            return view('users.info',compact('info'));
        }else{
            return view('users.create',compact('user'));
        }
       // return view('users.create',compact('user','name'));
    }

   
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user','roles'));
    }

   
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('users.edit', $user)->with('info', 'Se asigno rol');
    }

    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('danger','Se elimino usuario'); 
    }

    public function nuevo(){
        return view('users.nuevo');
    }

    public function actualizar(Request $request){
        $request->validate([
            'cedula' => 'required',
            'nombres' => 'required',
            'cargo' => 'required',
            'lugar_nacimiento' => 'required',
            'fecha_nacimiento' => 'required|date',
            'fecha_expedicion' => 'required|date',
            'altura' => 'required',
            'sexo' => 'required',
            'Grupo_Sanguineo' => 'required',
        ]);

        if($request){
                $users = DB::table('datos')->where('cedula', $request->cedula)->update([
                    'cedula' => $request->cedula,
                    'nombres' => $request->nombres,
                    'cargo' => $request->cargo,
                    'lugar_nacimiento' => $request->lugar_nacimiento,
                    'fecha_nacimiento' => $request->fecha_nacimiento,
                    'fecha_expedicion' => $request->fecha_expedicion,
                    'altura' => $request->altura,
                    'sexo' => $request->sexo,
                    'Grupo_Sanguineo' => $request->Grupo_Sanguineo            
                ]); 

                if($users){
                    return redirect()->route('users.index')->with('info','Se actualizo los datos del usuario '.$request->nombres);
                 }else
                    return redirect()->route('users.index')->with('danger','¡¡¡ ALGO SALIO MAL !!! No se pudo actualizar los datos de '.$request->nombres.' o no se realizo cambios');   
                                
        }else{
            return "No hubo cambios";
        }  
    }
        
    public function reset(User $users){
    //   return $users->email;
        $pass = Hash::make('SSN2023*');
      
        $user =  User::where('email', $users->email)->update(['password' => $pass]);       
        
        if($user){
            return redirect()->route('users.index')->with('info','Se ha realizado cambio de contraseña, el correo :'.$users->email.' ahora ingresa con la contraseña : SSN2023*');             
         } else{
            return redirect()->route('users.index')->with('danger','¡¡¡ ALGO SALIO MAL !!! No se pudo resetear contraseña de '.$users->correo); 
        }   
    }
         
}
