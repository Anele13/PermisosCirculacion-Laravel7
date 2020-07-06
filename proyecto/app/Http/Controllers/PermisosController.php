<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permiso;
use App\Superior;
use App\Sector;
use App\Dependencia;
use App\Espacio;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;
use PDF;
use Illuminate\Support\Str;

class PermisosController extends Controller
{

    public function index(){
        $datos['permisos']= Permiso::paginate(10);
        $datos2['superiores'] = Superior::all();
        $datos3['sectores'] = Sector::all();
        $datos4['dependencias'] = Dependencia::all();
        $datos5['espacios'] = Espacio::all();
        return view ('admin.permisos',$datos,$datos2,$datos3,$datos4,$datos5);
    }

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
        $datosPersona['habilitado']=false;
        $datosPersona['token']= Str::random($length = 20); //genera un token random
        Permiso::insert($datosPersona);

        $ultimoPermiso = Permiso::all()->last();
        $token=$ultimoPermiso->token;
        $idSuperior= $ultimoPermiso->superior;
        $superior = Superior:: where("id","=",$idSuperior)->first();
        $superiorEmail= $superior->email;

        
        //Metodo 2 de enviar mail
        //Creo el pdf para enviar
        $pdf = PDF::loadView('emails.pdf-content', ["ultimoPermiso"=>$ultimoPermiso]);

        //adjunto el pdf y lo envio por mail
        $to_name = "Administrador del Sitio";
        #$to_email = "anelegaribaldi@gmail.com";
        #$to_email = "taniiaaranda@gmail.com";
        $to_email = $superiorEmail;
        $data_contenido_mail = [
            'token' => $token,
            'url' => url('/')
        ];

        Mail::send("emails.message-content", ["data"=>$data_contenido_mail], function($message) use ($to_name, $to_email, $pdf) {
        $message->to($to_email, $to_name)->subject("Solicitud de Permiso");
        $message->from("anelegaribaldi@gmail.com","Sitio de Permisos");
        $message->attachData($pdf->output(), "permiso.pdf");
        });  
        
        return redirect()->route('index')->with('success','Su solicitud de permiso ha sido enviada');
        //return  back()->with('success','Su solicitud de permiso ha sido enviada');
    }


    public function responsables(){
        $datos['superiores']= Superior::paginate(10);
        return view ('admin.responsables',$datos);
    }

    public function responsable(){
        return view ('admin.responsable');
    }

    public function sector(){
        return view ('admin.sector');
    }
    public function Dependencia(){
        return view ('admin.dependencia');
    }
    public function Espacio(){
        return view ('admin.espacio');
    }

    public function nada(){
        $ultimoPermiso = Permiso::all()->last();
        //Excluimos algunos campos
        return view ('emails.pdf-content')->with('ultimoPermiso',$ultimoPermiso);
    }

    public function habilitarPermiso(Request $request){
        $token = $request->get('token');        
        if ($token !== null){
            $permiso = Permiso:: where("token","=",$token)->first();
            if ($permiso !== null){
                $email = $permiso->email;
                //enviar  la persona el permiso
                $msg = "Se ha dado de alta el permiso!";
                $permiso['habilitado'] = true;
                $permiso->save();
                $pdf = PDF::loadView('emails.pdf-content', ["ultimoPermiso"=>$permiso]);
                $to_name = "Administrador del Sitio";
                $to_email = $permiso->email;
                $data_contenido_mail = [
                    'token' => $token,
                    'url' => url('/')
                ];
                Mail::send("emails.message-response", ["data"=>$data_contenido_mail], function($message) use ($to_name, $to_email, $pdf) {
                    $message->to($to_email, $to_name)->subject("Solicitud de Permiso");
                    $message->from("anelegaribaldi@gmail.com","Sitio de Permisos");
                    $message->attachData($pdf->output(), "permiso.pdf");
                });  
                return view ('emails.permiso')->with('success',$msg);
            }else{
                $msg = 'No existe el formulario permiso solicitado';
                return view ('emails.permiso')->with('error',$msg);
            }            
        }
        else{
            $msg = 'Error dando de alta el permiso!';
            return view ('emails.permiso')->with('error',$msg);
        }
    }
}
