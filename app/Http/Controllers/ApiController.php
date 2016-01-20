<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Illuminate\Http\Respose;
use Mail;

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
use \App\Municipio;
use \App\Contacto;

use Illuminate\Support\Facades\Input;

class ApiController extends Controller
{
    //acidez
    public function getAcidez() {

      $acidez = Acidez::orderBy('nombre')->get();
      return response()->json($acidez)->setCallback(Input::get('callback'));

    }

    //aromas
    public function getAromas() {

      $aromas = Aroma::orderBy('nombre')->get();
      return response()->json($aromas)->setCallback(Input::get('callback'));

    }

    //municipio
    public function getMunicipios() {

      $municipios = Municipio::orderBy('nombre')->get();
      return response()->json($municipios)->setCallback(Input::get('callback'));

    }

    //certificaciones
    public function getCertificaciones() {

      $certificaciones = Certificacion::orderBy('nombre')->get();
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

      $departamentos = Departamento::orderBy('nombre')->get();
      return response()->json($departamentos)->setCallback(Input::get('callback'));

    }

    //fincas
    public function getFincas() {

      $fincas = Finca::with('productor','departamento','municipio')->orderBy('finca')
      ->get();
      return response()->json('')->setCallback(Input::get('callback'));

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

      $organizaciones = Organizacion::orderBy('nombre')->get();
      return response()->json($organizaciones)->setCallback(Input::get('callback'));

    }

    //productores
    public function getProductores() {

      $productores = new Productor();

      $productores = $productores->with('organizacion','medios','certificacion_productor.certificacion',
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

      $sabores = Sabor::orderBy('nombre')->get();
      return response()->json($sabores)->setCallback(Input::get('callback'));

    }

    //tiposBeneficios
    public function getTiposBeneficios() {

      $tiposBeneficios = Tipo_Beneficio::orderBy('nombre')->get();
      return response()->json($tiposBeneficios)->setCallback(Input::get('callback'));

    }

    //tiposSecados
    public function getTiposSecados() {

      $tiposSecados = Tipo_Secado::orderBy('nombre')->get();
      return response()->json($tiposSecados)->setCallback(Input::get('callback'));

    }

    //variedades
    public function getVariedades() {

      $variedades = Variedad::with('acidez', 'aroma', 'sabor')->orderBy('nombre')
      ->get();
      return response()->json($variedades)->setCallback(Input::get('callback'));

    }

    //contacto
    public function getContacto() {

      $productor = Productor::find(Input::get('productor_id'));

        $contacto = new Contacto();


        $contacto->productor_id   = Input::get('productor_id');
        $contacto->nombre         = Input::get('nombre');
        $contacto->correo         = Input::get('email');
        $contacto->telefono       = Input::get('telefono');
        $contacto->pais           = Input::get('pais');
        $contacto->mensaje        = Input::get('mensaje');


        $contacto->save();

        Mail::send('emails.notificacion_contacto', ['contacto' => $contacto, 'productor' => $productor], function ($m) use ($contacto, $productor) {
          $m->from('fernando@3jsoluciones.com', 'CAFES DEL HUILA');
          $m->to($contacto->correo, 'de ')->subject('Confirmacion de contacto');
        });

        Mail::send('emails.notificacion_confirmacion', ['contacto' => $contacto, 'productor' => $productor], function ($m) use ($contacto, $productor) {
          $m->from('fernando@3jsoluciones.com', 'CAFES DEL HUILA');
          $m->to('jorge@3jsoluciones.com', 'de ')->subject('Confirmacion de contacto');
        });

        return response()->json('ok')->setCallback(Input::get('callback'));


    }


}
