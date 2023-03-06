<?php

namespace App\Http\Controllers;

use App\Models\Datos;
use App\Models\Images;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class datosController extends Controller
{
    public function token(){
        
        $datos = Datos::all();
        return view('recaudador.token', compact('datos'));
    }

    public function datos(){
        
        return view('punto.datos');
    }

    public function imagen(User $user){            
      // return $user;
       $datos = Datos::where('user_id', $user->id)->get();      
        
        
        if($datos->count()){
                $cedula = $datos[0]['cedula'];
                $imagen = Images::where('datos_id',$cedula)->get();
                if($imagen->count()){
                    //return "tiene imagen de perfil";
                    return view('recaudador.foto',compact('imagen'));
                }else{
                    $cedula = $datos[0]['cedula'];
                    return view('recaudador.imagen',compact('cedula'));
                }
            
          

       }else{
            return redirect()->route('users.index')->with('danger','¡¡ El usuario '.$user->name.' no puede subir foto porque aun no tiene datos de registro agregados !!');
       }

       
    }

    public function subir(Request $request){
        $request->validate([
            'file' => 'required',
            'datos_id' => 'required'
        ]); 

       
      
        $url = Storage::put('foto_perfil', $request->file('file'));
     
        $imagen = Images::create([
            'url' => $url,
            'datos_id' => $request->datos_id,
        ]); 

        if($imagen){
            return redirect()->route('users.index')->with('info','Se agrego foto de perfil');            
        } else{
            return redirect()->route('users.index')->with('danger','¡¡ NO !! fue posible agregar foto de perfil'); 
            
        }              

        
    }

    public function foto(Request $request){
        $request->validate([
            'file' => 'required',
            'datos_id' => 'required'
        ]);

        $imagen = Images::where('id',$request->datos_id)->get();

        if($imagen){
            $url = Storage::put('foto_perfil', $request->file('file'));
            $image_path = public_path().'/Storage/'.$imagen[0]['url'];
            unlink($image_path);
            //$imagen->delete();
            DB::table('images')->where('id',$request->datos_id)->update([
                'url' => $url
            ]);

            return redirect()->route('users.index')->with('info','Se ha actualizado foto de perfil');     
        }else{
            return redirect()->route('users.index')->with('danger','¡¡ NO !! fue posible actualizar foto de perfil');
        }


    }

}
