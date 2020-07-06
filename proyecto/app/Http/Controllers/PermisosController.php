<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permiso;
use App\Superior;

class PermisosController extends Controller
{
    public function store(Request $request){
        $superiores = \App\Superior::get();
        $data = json_encode(array('data'=>$superiores));
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
        /*
        if($request-> has('superior')){
            //Metodo 2 de enviar mail
            //Creo el pdf para enviar
            $data_pdf = ["algo para enviar"];
            $pdf = PDF::loadView('emails.pdf-content', $data_pdf);

            //adjunto el pdf y lo envio por mail
            $to_name = "Administrador del Sitio";
            #$to_email = "anelegaribaldi@gmail.com";
            $to_email = "taniiaaranda@gmail.com";
            $data_contenido_mail = [
            'token' => "acaVaElCodigoDelPermiso"
            ];

            Mail::send("emails.message-content", ["data"=>$data_contenido_mail], function($message) use ($to_name, $to_email, $pdf) {
            $message->to($to_email, $to_name)->subject("Solicitud de Permiso");
            $message->from("anelegaribaldi@gmail.com","Sitio de Permisos");
            $message->attachData($pdf->output(), "permiso.pdf");
            });  
        }*/
        return redirect()->route('index')->with('success','Su solicitud de permiso ha sido enviada');
        //return  back()->with('success','Su solicitud de permiso ha sido enviada');
    }
}
