@extends('layouts.main')

<style type="text/css">

    li {
        list-style-type: none;
    }

</style>

@section('content')

<div class="container text-center">

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="title" style="color: #7c3d3d; font-size: 28px;">
                            <b>Cafes Del Huila</b>
                        </div>
                    </div>

                    <div class="panel-body">
                        Bienvenido a Cafes del Huila, Señor(a): {{ Auth::User()->name }}
                    </div>

                    <ul>
                        <li><a href="http://cafesdelhuila.com/acidez/create">Acidez</a></li>
                        <li><a href="http://cafesdelhuila.com/aromas/create">Aromas</a></li>
                        <li><a href="http://cafesdelhuila.com/certificaciones/create">Certificaciones</a></li>
                        <li><a href="http://cafesdelhuila.com/certificacionesProductores/create">Certificaciones de Productores</a></li>
                        <li><a href="http://cafesdelhuila.com/departamentos/create">Departamentos</a></li>
                        <li><a href="http://cafesdelhuila.com/fincas/create">Fincas</a></li>
                        <li><a href="http://cafesdelhuila.com/lotes/create">Lotes</a></li>
                        <li><a href="http://cafesdelhuila.com/medios/create">Medios</a></li>
                        <li><a href="http://cafesdelhuila.com/municipios/create">Municipios</a></li>
                        <li><a href="http://cafesdelhuila.com/organizaciones/create">Organizaciones</a></li>
                        <li><a href="http://cafesdelhuila.com/productores/create">Productores</a></li>
                        <li><a href="http://cafesdelhuila.com/sabores/create">Sabores</a></li>
                        <li><a href="http://cafesdelhuila.com/tiposBeneficios/create">Tipos Beneficios</a></li>
                        <li><a href="http://cafesdelhuila.com/tiposSecados/create">Tipos Secados</a></li>
                        <li><a href="http://cafesdelhuila.com/variedades/create">Variedades</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>



</div>

@endsection
