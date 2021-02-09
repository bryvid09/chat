<?php

namespace App\Http\Controllers;
use App\Http\Traits\Usuarios;

use Illuminate\Http\Request;

class chatController extends Controller
{
    use usuarios;   
  
    /**
     * Comprueba si podemos acceder a la vista
     * o no
     */
    public function ingresar(Request $request){
        $datos = request() -> validate([
            'user' => 'required',
        ]);   
        $datos['online']='yes';
        if(usuarios::comprobarUser($datos)){
            $_SESSION['user'] = $datos['user'];        
            return view('chat');
        }
        else{
            return back()->with('El usuario ya existe');
        }
    }

    public function enviarMensaje(Request $request){
        $mensaje = request() -> validate([
            'mensaje' => 'required',
        ]);
        usuarios::registrarMensaje($mensaje);
        return view('chat');
    }
}
