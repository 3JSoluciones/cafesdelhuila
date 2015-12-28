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
    return view('welcome');
});

/*inicio aromas*/
Route::get('aromas/nuevo', 'AromasController@nuevo');
/*fin aromas*/

/*inicio acidez*/
Route::get('acidez/nueva', 'AcidezController@nueva');
/*fin acidez*/

/*inicio sabores*/
Route::get('sabores/nuevo', 'SaboresController@nuevo');
/*fin sabores*/

/*inicio organizaciones*/
Route::get('organizaciones/nueva', 'OrganizacionesController@nueva');
/*fin organizaciones*/

/*inicio certificaciones*/
Route::get('certificaciones/nueva', 'CertificacionesController@nueva');
/*fin certificaciones*/

/*inicio tiposSecados*/
Route::get('tiposSecados/nuevo', 'TiposSecadosController@nuevo');
/*fin tiposSecados*/

/*inicio tiposBeneficios*/
Route::get('tiposBeneficios/nuevo', 'TiposBeneficiosController@nuevo');
/*fin tiposBeneficios*/

/*inicio departamentos*/
Route::get('departamentos/nuevo', 'DepartamentosController@nuevo');
/*fin departamentos*/

/*inicio municipios*/
Route::get('municipios/nuevo', 'MunicipiosController@nuevo');
/*fin municipios*/

/*inicio lotes*/
Route::get('lotes/nuevo', 'LotesController@nuevo');
/*fin lotes*/

/*inicio variedades*/
Route::get('variedades/nueva', 'VariedadesController@nueva');
/*fin variedades*/


/*inicio productores*/
Route::get('productores/nuevo', 'ProductoresController@nuevo');
/*fin productores*/








Route::group(['middleware' => ['web']], function () {
    //
});
