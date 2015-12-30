<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('layouts.main');
});

/*inicio departamentos*/
Route::resource('departamentos', 'DepartamentosController');
/*fin departamentos*/

/*inicio municipios*/
Route::resource('municipios', 'MunicipiosController');
/*fin municipios*/

/*inicio certificaciones*/
Route::resource('certificaciones', 'CertificacionesController');
/*fin certificaciones*/

/*inicio organizaciones*/
Route::resource('organizaciones', 'OrganizacionesController');
/*fin organizaciones*/

/*inicio tiposBeneficios*/
Route::resource('tiposBeneficios', 'TiposBeneficiosController');
/*fin tiposBeneficios*/

/*inicio sabores*/
Route::resource('sabores', 'SaboresController');
/*fin sabores*/

/*inicio acidez*/
Route::resource('acidez', 'AcidezController');
/*fin acidez*/

/*inicio aromas*/
Route::resource('aromas', 'AromasController');
/*fin aromas*/

/*inicio tiposSecados*/
Route::resource('tiposSecados', 'TiposSecadosController');
/*fin tiposSecados*/

/*inicio variedades*/
Route::resource('variedades', 'VariedadesController');
/*fin variedades*/

/*inicio productores*/
Route::resource('productores', 'ProductoresController');
/*fin productores*/

/*inicio certificacionesProductores*/
Route::resource('certificacionesProductores', 'CertificacionesProductoresController');
/*fin certificacionesProductores*/

/*inicio fincas*/
Route::resource('fincas', 'FincasController');
/*fin fincas*/

/*inicio lotes*/
Route::resource('lotes', 'LotesController');
/*fin lotes*/





/*inicio medios*/
Route::get('medios/nuevo', 'MediosController@nuevo');
/*fin medios*/






Route::group(['middleware' => ['web']], function () {
    //
});
