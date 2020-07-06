<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# El index del sitio
Route::get('/', function () {
    $requerimientos = \App\Requerimientos::find(1);
    $superiores = \App\Superior::get();
    $sectores = \App\Sector::get();
    $dependencias = \App\Dependencia::get();
    $espacios = \App\Espacio::get();
    $data = json_encode(array('data'=>$superiores));
    $data_sectores = json_encode(array('data_sectores'=>$sectores));
    $data_dependencias = json_encode(array('data_dependencias'=>$dependencias));
    $data_espacios = json_encode(array('data_espacios'=>$espacios));
    return view('index.index',compact("requerimientos","data","data_sectores","data_dependencias","data_espacios"));
})->name('index');
    
# La parte del administrador del sitio
Route::get('/admin', function () {
    $requerimientos = \App\Requerimientos::find(1);
    return view('admin.index',["requerimientos"=>$requerimientos]); //admin.index
});

Route::get('/admin/permisos', 'PermisosController@index')->name('permisos');
Route::get('/admin/responsables', 'PermisosController@responsables')->name('responsables');
Route::get('/admin/responsable', 'PermisosController@responsable')->name('responsable');

Route::post('/alta_reponsable','RequerimientosController@altaResponsable')->name('alta_reponsable');
Route::get('/update_campos_persona','RequerimientosController@updateCamposPersona')->name('update_campos_persona');
Route::post('/update_campos_sitio', 'RequerimientosController@updateCamposSitio')->name('update_campos_sitio');
Route::get('/update_campos_organizacion', 'RequerimientosController@updateCamposOrganizacion')->name('update_campos_organizacion');
Route::post('/permisos_store', 'PermisosController@store')->name('permisos_store');

Route::get('/nada', 'PermisosController@nada')->name('nada');

Route::get('/habilitar_permiso','PermisosController@habilitarPermiso')->name('habilitarPermiso');

//{{$data["url"]}}/habilitar_permiso/{{$data["token"]}}



