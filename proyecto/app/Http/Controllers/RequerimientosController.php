<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Requerimientos;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;
use PDF;


class RequerimientosController extends Controller {

   public function updateCamposPersona(Request $request) {
      //error_log($request->input('nombre'));
      
      $requerimientos = Requerimientos::find(1);
      $atributos = json_decode($requerimientos->datos_persona, true);
      foreach($atributos as $key=>$value) {
        $atributos[$key] = $request->input($key);
        //error_log($request->input($key));
      }

      $requerimientos->datos_persona = json_encode($atributos);
      $requerimientos->save();
      $msg = "This is a simple message."; 
      error_log("acasasdasd");
      
      //METODO 1 De enviar mail
      //Mail::to('anelegaribaldi@gmail.com')->queue(new MessageReceived($msg));
      return response()->json(array('msg'=> $msg), 200);
   }


   public function updateCamposSitio(Request $request){
      $imageName = null;
      request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', #required
      ]);      
      $requerimientos = Requerimientos::find(1);
      $atributos = json_decode($requerimientos->datos_sitio, true);
      if(request()->image != null){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
            $atributos["imagen"] = $imageName;
      }
      $atributos["colorBarra"] = $request->input("colorBarra");
      $atributos["colorFondo"] = $request->input("colorFondo");

      $requerimientos->datos_sitio = json_encode($atributos);
      $requerimientos->save();
      $requerimientos = Requerimientos::find(1);

      return back()
            ->with('success','Se han modificado los datos del sitio!')
            ->with('requerimientos',$requerimientos);
   }


   public function updateCamposOrganizacion(Request $request){
      
      $requerimientos = Requerimientos::find(1);
      $atributos = json_decode($requerimientos->datos_organizacion, true);
      
      foreach($atributos as $key=>$value) {
        $atributos[$key] = $request->input($key);
      }
      $requerimientos->datos_organizacion = json_encode($atributos);
      $requerimientos->save();
      $msg = "This is a simple message.";
      return response()->json(array('msg'=> $msg), 200);
   }
}
