<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Illuminate\Http\Respose;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use \App\Aroma;
use \App\Acidez;
use \App\Certificacion;
use \App\Certificacion_Productor;
use \App\Departamento;
use \App\Finca;
use \App\Lote;
use \App\Medio;
use \App\Organizacion;
use \App\Productor;
use \App\Sabor;
use \App\Tipo_Beneficio;
use \App\Tipo_Secado;
use \App\Variedad;

use Illuminate\Support\Facades\Input;

class ApiController extends Controller
{
    //acidez
    public function getAcidez() {

      $acidez = Acidez::all();
      return response()->json($acidez)->setCallback(Input::get('callback'));

    }

    //aromas
    public function getAromas() {

      $aromas = Aroma::all();
      return response()->json($aromas)->setCallback(Input::get('callback'));

    }

    //certificaciones
    public function getCertificaciones() {

      $certificaciones = Certificacion::all();
      return response()->json($certificaciones)->setCallback(Input::get('callback'));

    }

    //certificacionesProductores
    public function getCertificacionesProductores() {

      $certificacionesProductores = Certificacion_Productor::with('certificacion','productor')
      ->get();
      return response()->json($certificacionesProductores)->setCallback(Input::get('callback'));

    }

    //departamentos
    public function getDepartamentos() {

      $departamentos = Departamento::all();
      return response()->json($departamentos)->setCallback(Input::get('callback'));

    }

    //fincas
    public function getFincas() {

      $fincas = Finca::with('productor','departamento','municipio')
      ->get();
      return response()->json($fincas)->setCallback(Input::get('callback'));

    }

    //lotes
    public function getLotes() {

      $lotes = Lote::with('finca', 'variedad1', 'tipo_beneficio', 'tipo_secado', 'acidez', 'aroma', 'sabor')
      ->get();
      return response()->json($lotes)->setCallback(Input::get('callback'));

    }

    //medios
    public function getMedios() {

      $medios = Medio::all();
      return response()->json($medios)->setCallback(Input::get('callback'));

    }

    //organizaciones
    public function getOrganizaciones() {

      $organizaciones = Organizacion::all();
      return response()->json($organizaciones)->setCallback(Input::get('callback'));

    }

    //productores
    public function getProductores() {

      $productores = new Productor();

      $productores = $productores->with('organizacion','certificacion_productor',
      'fincas','fincas.lotes','fincas.departamento','fincas.municipio',
      'fincas.lotes.variedad1',

      'fincas.lotes.variedad1.acidez',
      'fincas.lotes.variedad1.aroma',
      'fincas.lotes.variedad1.sabor',

      'fincas.lotes.variedad2',

      'fincas.lotes.variedad2.acidez',
      'fincas.lotes.variedad2.aroma',
      'fincas.lotes.variedad2.sabor',

      'fincas.lotes.variedad3',

      'fincas.lotes.variedad3.acidez',
      'fincas.lotes.variedad3.aroma',
      'fincas.lotes.variedad3.sabor',

      'fincas.lotes.acidez','fincas.lotes.aroma','fincas.lotes.sabor',
      'fincas.lotes.tipo_beneficio', 'fincas.lotes.tipo_secado')->get();
      //return response()->json(Input::get($productores))->setCallback(Input::get('callback'));
      //return response()->json(Input::get('aroma'))->setCallback(Input::get('callback'));

      /*if(Input::get('organizacion') != -1) {
        $productores = $productores->where('organizacion_id', '=', Input::get('organizacion'));
      }

      $productores = $productores->where('fincas.municipio_id', '=', 17);


      $toReturn = $productores->get();*/
      
      return response()->json($productores)->setCallback(Input::get('callback'));

    }

    //sabores
    public function getSabores() {

      $sabores = Sabor::all();
      return response()->json($sabores)->setCallback(Input::get('callback'));

    }

    //tiposBeneficios
    public function getTiposBeneficios() {

      $tiposBeneficios = Tipo_Beneficio::all();
      return response()->json($tiposBeneficios)->setCallback(Input::get('callback'));

    }

    //tiposSecados
    public function getTiposSecados() {

      $tiposSecados = Tipo_Secado::all();
      return response()->json($tiposSecados)->setCallback(Input::get('callback'));

    }

    //variedades
    public function getVariedades() {

      $variedades = Variedad::with('acidez', 'aroma', 'sabor')
      ->get();
      return response()->json($variedades)->setCallback(Input::get('callback'));

    }


}
