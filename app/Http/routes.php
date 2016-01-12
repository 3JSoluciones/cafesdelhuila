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

Route::group(['middleware' => ['web']], function () {

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    /*inicio acidez*/
    Route::get('acidez/listado', 'AcidezController@getAcidez');
    Route::resource('acidez', 'AcidezController');
    /*fin acidez*/

    /*inicio aromas*/
    Route::get('aromas/listado', 'AromasController@getAromas');
    Route::resource('aromas', 'AromasController');
    /*fin aromas*/

    /*inicio certificaciones*/
    Route::get('certificaciones/listado', 'CertificacionesController@getCertificaciones');
    Route::resource('certificaciones', 'CertificacionesController');
    /*fin certificaciones*/

    /*inicio certificacionesProductores*/
    Route::get('certificacionesProductores/listado', 'CertificacionesProductoresController@getCertificacionesProductores');
    Route::resource('certificacionesProductores', 'CertificacionesProductoresController');
    /*fin certificacionesProductores*/

    //rutas del sistema
    /*inicio departamentos*/
    Route::get('departamentos/listado', 'DepartamentosController@getDepartamentos');
    Route::resource('departamentos', 'DepartamentosController');
    /*fin departamentos*/

    /*inicio fincas*/
    Route::get('fincas/listado', 'FincasController@getFincas');
    Route::resource('fincas', 'FincasController');
    /*fin fincas*/

    /*inicio lotes*/
    Route::get('lotes/listado', 'LotesController@getLotes');
    Route::resource('lotes', 'LotesController');
    /*fin lotes*/

    /*inicio municipios*/
    Route::get('municipios/listado', 'MunicipiosController@getMunicipios');
    Route::resource('municipios', 'MunicipiosController');
    /*fin municipios*/

    /*inicio organizaciones*/
    Route::get('organizaciones/listado', 'OrganizacionesController@getOrganizaciones');
    Route::resource('organizaciones', 'OrganizacionesController');
    /*fin organizaciones*/

    /*inicio productores*/
    Route::get('productores/listado', 'ProductoresController@getProductores');
    Route::resource('productores', 'ProductoresController');
    /*fin productores*/

    /*inicio sabores*/
    Route::get('sabores/listado', 'SaboresController@getSabores');
    Route::resource('sabores', 'SaboresController');
    /*fin sabores*/

    /*inicio tiposBeneficios*/
    Route::get('tiposBeneficios/listado', 'TiposBeneficiosController@getTiposBeneficios');
    Route::resource('tiposBeneficios', 'TiposBeneficiosController');
    /*fin tiposBeneficios*/

    /*inicio tiposSecados*/
    Route::get('tiposSecados/listado', 'TiposSecadosController@getTiposSecados');
    Route::resource('tiposSecados', 'TiposSecadosController');
    /*fin tiposSecados*/

    /*inicio variedades*/
    Route::get('variedades/listado', 'VariedadesController@getVariedades');
    Route::resource('variedades', 'VariedadesController');
    /*fin variedades*/



    /*inicio medios*/
    Route::resource('medios', 'MediosController');
    /*fin medios*/


});
