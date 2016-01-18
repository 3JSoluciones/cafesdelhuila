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

//acidez
Route::get('acidez/getCrear', [
	'as' 		=> 'acidez-getCrear',
	'uses'	=> 'AcidezController@getCrear'
]);

Route::get('acidez/getListado', [
	'as' 		=> 'acidez-getListado',
	'uses'	=> 'AcidezController@getListado'
]);

Route::post('acidez/postCrear', [
	'as' 		=> 'acidez-postCrear',
	'uses'	=> 'AcidezController@postCrear'
]);

Route::post('acidez/postActualizar', [
	'as' 		=> 'acidez-postActualizar',
	'uses'	=> 'AcidezController@postActualizar'
]);

Route::post('acidez/postEliminar', [
	'as' 		=> 'acidez-postEliminar',
	'uses'	=> 'AcidezController@postEliminar'
]);
//acidez

//aromas
Route::get('aromas/getCrear', [
	'as' 		=> 'aromas-getCrear',
	'uses'	=> 'AromasController@getCrear'
]);
Route::get('aromas/getListado', [
	'as' 		=> 'aromas-getListado',
	'uses'	=> 'AromasController@getListado'
]);

Route::post('aromas/postCrear', [
	'as' 		=> 'aromas-postCrear',
	'uses'	=> 'AromasController@postCrear'
]);

Route::post('aromas/postActualizar', [
	'as' 		=> 'aromas-postActualizar',
	'uses'	=> 'AromasController@postActualizar'
]);

Route::post('aromas/postEliminar', [
	'as' 		=> 'aromas-postEliminar',
	'uses'	=> 'AromasController@postEliminar'
]);
//aromas

//certificaciones
Route::get('certificaciones/getCrear', [
	'as' 		=> 'certificaciones-getCrear',
	'uses'	=> 'CertificacionesController@getCrear'
]);
Route::get('certificaciones/getListado', [
	'as' 		=> 'certificaciones-getListado',
	'uses'	=> 'CertificacionesController@getListado'
]);

Route::post('certificaciones/postCrear', [
	'as' 		=> 'certificaciones-postCrear',
	'uses'	=> 'CertificacionesController@postCrear'
]);

Route::post('certificaciones/postActualizar', [
	'as' 		=> 'certificaciones-postActualizar',
	'uses'	=> 'CertificacionesController@postActualizar'
]);

Route::post('certificaciones/postEliminar', [
	'as' 		=> 'certificaciones-postEliminar',
	'uses'	=> 'CertificacionesController@postEliminar'
]);
//certificaciones

//departamentos
Route::get('departamentos/getCrear', [
	'as' 		=> 'departamentos-getCrear',
	'uses'	=> 'DepartamentosController@getCrear'
]);
Route::get('departamentos/getListado', [
	'as' 		=> 'departamentos-getListado',
	'uses'	=> 'DepartamentosController@getListado'
]);

Route::post('departamentos/postCrear', [
	'as' 		=> 'departamentos-postCrear',
	'uses'	=> 'DepartamentosController@postCrear'
]);

Route::post('departamentos/postActualizar', [
	'as' 		=> 'departamentos-postActualizar',
	'uses'	=> 'DepartamentosController@postActualizar'
]);

Route::post('departamentos/postEliminar', [
	'as' 		=> 'departamentos-postEliminar',
	'uses'	=> 'DepartamentosController@postEliminar'
]);
//departamentos

//municipios
Route::get('municipios/getCrear', [
	'as' 		=> 'municipios-getCrear',
	'uses'	=> 'MunicipiosController@getCrear'
]);
Route::get('municipios/getListado', [
	'as' 		=> 'municipios-getListado',
	'uses'	=> 'MunicipiosController@getListado'
]);

Route::post('municipios/postCrear', [
	'as' 		=> 'municipios-postCrear',
	'uses'	=> 'MunicipiosController@postCrear'
]);

Route::post('municipios/postActualizar', [
	'as' 		=> 'municipios-postActualizar',
	'uses'	=> 'MunicipiosController@postActualizar'
]);

Route::post('municipios/postEliminar', [
	'as' 		=> 'municipios-postEliminar',
	'uses'	=> 'MunicipiosController@postEliminar'
]);
//municipios

//organizaciones
Route::get('organizaciones/getCrear', [
	'as' 		=> 'organizaciones-getCrear',
	'uses'	=> 'OrganizacionesController@getCrear'
]);
Route::get('organizaciones/getListado', [
	'as' 		=> 'organizaciones-getListado',
	'uses'	=> 'OrganizacionesController@getListado'
]);

Route::post('organizaciones/postCrear', [
	'as' 		=> 'organizaciones-postCrear',
	'uses'	=> 'OrganizacionesController@postCrear'
]);

Route::post('organizaciones/postActualizar', [
	'as' 		=> 'organizaciones-postActualizar',
	'uses'	=> 'OrganizacionesController@postActualizar'
]);

Route::post('organizaciones/postEliminar', [
	'as' 		=> 'organizaciones-postEliminar',
	'uses'	=> 'OrganizacionesController@postEliminar'
]);
//organizaciones

//sabores
Route::get('sabores/getCrear', [
	'as' 		=> 'sabores-getCrear',
	'uses'	=> 'SaboresController@getCrear'
]);
Route::get('sabores/getListado', [
	'as' 		=> 'sabores-getListado',
	'uses'	=> 'SaboresController@getListado'
]);

Route::post('sabores/postCrear', [
	'as' 		=> 'sabores-postCrear',
	'uses'	=> 'SaboresController@postCrear'
]);

Route::post('sabores/postActualizar', [
	'as' 		=> 'sabores-postActualizar',
	'uses'	=> 'SaboresController@postActualizar'
]);

Route::post('sabores/postEliminar', [
	'as' 		=> 'sabores-postEliminar',
	'uses'	=> 'SaboresController@postEliminar'
]);
//sabores

//tiposBeneficios
Route::get('tiposBeneficios/getCrear', [
	'as' 		=> 'tiposBeneficios-getCrear',
	'uses'	=> 'TiposBeneficiosController@getCrear'
]);
Route::get('tiposBeneficios/getListado', [
	'as' 		=> 'tiposBeneficios-getListado',
	'uses'	=> 'TiposBeneficiosController@getListado'
]);

Route::post('tiposBeneficios/postCrear', [
	'as' 		=> 'tiposBeneficios-postCrear',
	'uses'	=> 'TiposBeneficiosController@postCrear'
]);

Route::post('tiposBeneficios/postActualizar', [
	'as' 		=> 'tiposBeneficios-postActualizar',
	'uses'	=> 'TiposBeneficiosController@postActualizar'
]);

Route::post('tiposBeneficios/postEliminar', [
	'as' 		=> 'tiposBeneficios-postEliminar',
	'uses'	=> 'TiposBeneficiosController@postEliminar'
]);
//tiposBeneficios

//tiposSecados
Route::get('tiposSecados/getCrear', [
	'as' 		=> 'tiposSecados-getCrear',
	'uses'	=> 'TiposSecadosController@getCrear'
]);
Route::get('tiposSecados/getListado', [
	'as' 		=> 'tiposSecados-getListado',
	'uses'	=> 'TiposSecadosController@getListado'
]);

Route::post('tiposSecados/postCrear', [
	'as' 		=> 'tiposSecados-postCrear',
	'uses'	=> 'TiposSecadosController@postCrear'
]);

Route::post('tiposSecados/postActualizar', [
	'as' 		=> 'tiposSecados-postActualizar',
	'uses'	=> 'TiposSecadosController@postActualizar'
]);

Route::post('tiposSecados/postEliminar', [
	'as' 		=> 'tiposSecados-postEliminar',
	'uses'	=> 'TiposSecadosController@postEliminar'
]);
//tiposSecados

//variedades
Route::get('variedades/getCrear', [
	'as' 		=> 'variedades-getCrear',
	'uses'	=> 'VariedadesController@getCrear'
]);
Route::get('variedades/getListado', [
	'as' 		=> 'variedades-getListado',
	'uses'	=> 'VariedadesController@getListado'
]);

Route::post('variedades/postCrear', [
	'as' 		=> 'variedades-postCrear',
	'uses'	=> 'VariedadesController@postCrear'
]);

Route::post('variedades/postActualizar', [
	'as' 		=> 'variedades-postActualizar',
	'uses'	=> 'VariedadesController@postActualizar'
]);

Route::post('variedades/postEliminar', [
	'as' 		=> 'variedades-postEliminar',
	'uses'	=> 'VariedadesController@postEliminar'
]);
//variedades

//productores
Route::get('productores/getCrear', [
	'as' 		=> 'productores-getCrear',
	'uses'	=> 'ProductoresController@getCrear'
]);
Route::get('variedproductoresades/getListado', [
	'as' 		=> 'productores-getListado',
	'uses'	=> 'ProductoresController@getListado'
]);

Route::post('productores/postCrear', [
	'as' 		=> 'productores-postCrear',
	'uses'	=> 'ProductoresController@postCrear'
]);

Route::post('productores/postActualizar', [
	'as' 		=> 'productores-postActualizar',
	'uses'	=> 'ProductoresController@postActualizar'
]);

Route::post('productores/postEliminar', [
	'as' 		=> 'productores-postEliminar',
	'uses'	=> 'ProductoresController@postEliminar'
]);

Route::post('productores/postSubirImagen', [
	'as'		=> 'productores-postSubirImagen',
	'uses'	=> 'ProductoresController@postSubirImagen'
]);


//productores

//perfil productores

Route::get('productoresPerfil/getPerfil/{id}', [
	'as' 		=> 'productoresPerfil-getPerfil',
	'uses'	=> 'ProductoresController@getPerfil'
]);

Route::get('productoresPerfil/getActualizar/{id}', [
	'as' 		=> 'productoresPerfil-getActualizar',
	'uses'	=> 'ProductoresController@getActualizar'
]);

//fincas perfil

Route::get('fincas/getListado', [
	'as' 		=> 'fincas-getListado',
	'uses'	=> 'FincasController@getListado'
]);

Route::get('fincas/getCrear', [
	'as' 		=> 'fincas-getCrear',
	'uses'	=> 'FincasController@getCrear'
]);

Route::post('fincas/postCrear', [
	'as' 		=> 'fincas-postCrear',
	'uses'	=> 'FincasController@postCrear'
]);

Route::post('fincas/postActualizar', [
	'as' 		=> 'fincas-postActualizar',
	'uses'	=> 'FincasController@postActualizar'
]);

Route::post('fincas/postEliminar', [
	'as' 		=> 'fincas-postEliminar',
	'uses'	=> 'FincasController@postEliminar'
]);

//fincas perfil

//lotes perfil

Route::get('lotes/getListado', [
	'as' 		=> 'lotes-getListado',
	'uses'	=> 'LotesController@getListado'
]);

Route::get('lotes/getCrear', [
	'as' 		=> 'lotes-getCrear',
	'uses'	=> 'LotesController@getCrear'
]);

Route::post('lotes/postCrear', [
	'as' 		=> 'lotes-postCrear',
	'uses'	=> 'LotesController@postCrear'
]);

Route::post('lotes/postActualizar', [
	'as' 		=> 'lotes-postActualizar',
	'uses'	=> 'LotesController@postActualizar'
]);

Route::post('lotes/postEliminar', [
	'as' 		=> 'lotes-postEliminar',
	'uses'	=> 'LotesController@postEliminar'
]);

//lotes perfil

//certificacionesProductores perfil

Route::get('certificacionesProductores/getListado', [
	'as' 		=> 'certificacionesProductores-getListado',
	'uses'	=> 'CertificacionesProductoresController@getListado'
]);

Route::get('certificacionesProductores/getCrear', [
	'as' 		=> 'certificacionesProductores-getCrear',
	'uses'	=> 'CertificacionesProductoresController@getCrear'
]);

Route::post('certificacionesProductores/postCrear', [
	'as' 		=> 'certificacionesProductores-postCrear',
	'uses'	=> 'CertificacionesProductoresController@postCrear'
]);

Route::post('certificacionesProductores/postActualizar', [
	'as' 		=> 'certificacionesProductores-postActualizar',
	'uses'	=> 'CertificacionesProductoresController@postActualizar'
]);

Route::post('certificacionesProductores/postEliminar', [
	'as' 		=> 'certificacionesProductores-postEliminar',
	'uses'	=> 'CertificacionesProductoresController@postEliminar'
]);

//certificacionesProductores perfil

//medios perfil


Route::get('mediosProductor/getListado', [
	'as' 		=> 'mediosProductor-getListado',
	'uses'	=> 'MediosController@getListado'
]);

Route::get('mediosProductor/getCrear', [
	'as' 		=> 'mediosProductor-getCrear',
	'uses'	=> 'MediosController@getCrear'
]);

Route::post('mediosProductor/postCrear', [
	'as' 		=> 'mediosProductor-postCrear',
	'uses'	=> 'MediosController@postCrear'
]);

Route::post('mediosProductor/postEliminar', [
	'as' 		=> 'mediosProductor-postEliminar',
	'uses'	=> 'MediosController@postEliminar'
]);

//medios perfil

//perfil productores



Route::group(['middleware' => ['web']], function () {

});


Route::group(['middleware' => 'web'], function () {

	Route::auth();
	Route::get('/home', 'HomeController@index');
	Route::get('/', function () {
		return view('layouts.main');
	});

});


// API
Route::group(['prefix' => 'api'], function () {

	//acidez
	Route::get('acidez', [
		'as'		=> 'acidez',
		'uses'	=> 'ApiController@getAcidez'
	]);

	//aromas
	Route::get('aromas', [
		'as'		=> 'aromas',
		'uses'	=> 'ApiController@getAromas'
	]);

	//certificaciones
	Route::get('certificaciones', [
		'as'		=> 'certificaciones',
		'uses'	=> 'ApiController@getCertificaciones'
	]);

	//certificaciones productores
	Route::get('certificaciones_productores', [
		'as'		=> 'certificaciones_productores',
		'uses'	=> 'ApiController@getCertificacionesProductores'
	]);

	//departamentos
	Route::get('departamentos', [
		'as'		=> 'departamentos',
		'uses'	=> 'ApiController@getDepartamentos'
	]);

	//fincas
	Route::get('fincas', [
		'as'		=> 'fincas',
		'uses'	=> 'ApiController@getFincas'
	]);

	//lotes
	Route::get('lotes', [
		'as'		=> 'lotes',
		'uses'	=> 'ApiController@getLotes'
	]);

	//medios
	Route::get('medios', [
		'as'		=> 'medios',
		'uses'	=> 'ApiController@getMedios'
	]);

	//organizaciones
	Route::get('organizaciones', [
		'as'		=> 'organizaciones',
		'uses'	=> 'ApiController@getOrganizaciones'
	]);

	//productores
	Route::get('productores', [
		'as'		=> 'productores',
		'uses'	=> 'ApiController@getProductores'
	]);

	//sabores
	Route::get('sabores', [
		'as'		=> 'sabores',
		'uses'	=> 'ApiController@getSabores'
	]);

	//tiposBeneficios
	Route::get('tipos_beneficios', [
		'as'		=> 'tipos_beneficios',
		'uses'	=> 'ApiController@getTiposBeneficios'
	]);

	//tiposSecados
	Route::get('tipos_secados', [
		'as'		=> 'tipos_secados',
		'uses'	=> 'ApiController@getTiposSecados'
	]);

	//variedades
	Route::get('variedades', [
		'as'		=> 'variedades',
		'uses'	=> 'ApiController@getVariedades'
	]);


});
