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
    $data = json_encode(array('data'=>$superiores));
    return view('index.index',compact("requerimientos","data"));
})->name('index');
    
# La parte del administrador del sitio
Route::get('/admin', function () {
    $requerimientos = \App\Requerimientos::find(1);
    return view('admin.index',["requerimientos"=>$requerimientos]); //admin.index
});

Route::get('/update_campos_persona','RequerimientosController@updateCamposPersona')->name('update_campos_persona');
Route::post('/update_campos_sitio', 'RequerimientosController@updateCamposSitio')->name('update_campos_sitio');
Route::get('/update_campos_organizacion', 'RequerimientosController@updateCamposOrganizacion')->name('update_campos_organizacion');
Route::post('/permisos_store', 'PermisosController@store')->name('permisos_store');



