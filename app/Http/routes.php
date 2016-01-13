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

    //rutas del sistema
    /*inicio departamentos*/
    Route::get('departamentos/listado', 'DepartamentosController@getDepartamentos');
    Route::resource('departamentos', 'DepartamentosController');
    /*fin departamentos*/

    /*inicio productores*/
    Route::resource('productores', 'ProductoresController');
    Route::get('productores/perfil/{id}', 'ProductoresController@getPerfil');
    Route::get('productores/actualizar/{id}', 'ProductoresController@getActualizar');
    /*fin productores*/

    /*inicio fincas*/
    Route::get('fincas/crear', 'FincasController@getCrear');
    Route::resource('fincas', 'FincasController');
    /*fin fincas*/

    /*inicio certificacionesProductores*/
    Route::get('certificacionesProductores/crear', 'CertificacionesProductoresController@getCrear');
    Route::resource('certificacionesProductores', 'CertificacionesProductoresController');
    /*fin certificacionesProductores*/

    /*inicio organizaciones*/
    Route::get('organizaciones/listado', 'OrganizacionesController@getOrganizaciones');
    Route::resource('organizaciones', 'OrganizacionesController');
    /*fin organizaciones*/

    /*inicio lotes*/
    Route::get('lotes/listado', 'LotesController@getLotes');
    Route::resource('lotes', 'LotesController');
    /*fin lotes*/

    /*inicio municipios*/
    Route::get('municipios/listado', 'MunicipiosController@getMunicipios');
    Route::resource('municipios', 'MunicipiosController');
    /*fin municipios*/

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
    Route::get('medios/crear', 'MediosController@getCrear');
    Route::resource('medios', 'MediosController');
    /*fin medios*/


});
