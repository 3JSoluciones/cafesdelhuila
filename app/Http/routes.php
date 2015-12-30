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







/*inicio lotes*/
Route::get('lotes/nuevo', 'LotesController@nuevo');
/*fin lotes*/

/*inicio variedades*/
Route::get('variedades/nueva', 'VariedadesController@nueva');
/*fin variedades*/

/*inicio productores*/
Route::get('productores/nuevo', 'ProductoresController@nuevo');
/*fin productores*/

/*inicio certificacionesProductores*/
Route::get('certificacionesProductores/nueva', 'CertificacionesProductoresController@nueva');
/*fin certificacionesProductores*/

/*inicio fincas*/
Route::get('fincas/nueva', 'FincasController@nueva');
/*fin fincas*/

/*inicio medios*/
Route::get('medios/nuevo', 'MediosController@nuevo');
/*fin medios*/






Route::group(['middleware' => ['web']], function () {
    //
});
