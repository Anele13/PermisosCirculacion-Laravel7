<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permiso;

class PermisosController extends Controller
{
    public function store(Request $request){
        
        $datos=[];
        if($request->has('nombre')){
            $datos['nombre']='required|string|max:70';    
        }
        if($request->has('apellido')){
            $datos['apellido']='required|string|max:70';    
        }
        if($request->has('dni')){
            $datos['dni']='required|integer';    
        }
        if($request->has('legajo')){
            $datos['legajo']='required|integer';    
        }
        if($request->has('email')){
            $datos['email']='required|email|max:70';    
        }
        if($request->has('sector')){
            $datos['sector']='required|string|max:70';    
        }
        if($request->has('superior')){
            $datos['superior']='required|integer';    
        }
        if($request->has('dependencia')){
            $datos['dependencia']='required|string|max:70';    
        }
        if($request->has('espacio')){
            $datos['espacio']='required|string|max:70';    
        }
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request, $datos,$Mensaje);
        $datosPersona = $request->except('_token');
        
        Permiso::insert($datosPersona);
        return  back()->with('success','Su solicitud de permiso ha sido enviada');
    }
}
