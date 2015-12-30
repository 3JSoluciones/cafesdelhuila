@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Productores</li>
            </ol>
        </div>
    </div>
    <p><label>REGISTRO DE PRODUCTORES</label></p>

    <form>
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="toke" >

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Nombre</label><br>
                <input type="text" class="form-control" id="nombre" name="nombre" required="required"
                       placeholder="Ingrese el Nombre" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Telefono</label><br>
                <input type="text" class="form-control" id="telefono" name="telefono" required="required"
                       placeholder="Ingrese el telefono" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Organizacion</label><br>
                <select name="organizacion_id" id="organizacion_id" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($organizaciones as $organizacion)
                        <option value="{{ $organizacion->id }}">{{ $organizacion->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input">Correo Electronico</label><br>
                <input type="email" class="form-control" id="email" name="email" required="required"
                       placeholder="ejemplo@outlook.com" style="width: 100%">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Agregar Productor" class="btn btn-primary btn-sm"
                    id="btn-agregar-productores">
        </div>
    </div>

    </form>

    @section('page-js-code')

    <script type="application/javascript">

        $("#btn-agregar-productores").click(function(){

            var Organizacion_id    = $("#organizacion_id").val();
            var nombre             = $("#nombre").val();
            var Telefono           = $("#telefono").val();
            var Email              = $("#email").val();

            $.ajax({
                url: 'http://cafesdelhuila.com/productores',
                data:{
                    Organizacion_id:Organizacion_id,
                    nombre:nombre,
                    Telefono:Telefono,
                    Email:Email,
                },
                headers:{'X-CSRF-TOKEN': toke},
                dataType:'json',
                type:'POST',
                success:function(data) {
                    toastr.info("El productor " + nombre + " se agrego con exito.","PRODUCTORES");
                    $("#organizacion_id").val('');
                    $("#nombre").val('');
                    $("#telefono").val('');
                    $("#email").val('');
                }
            });
        });

    </script>
    @stop

@stop