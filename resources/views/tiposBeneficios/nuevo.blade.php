@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Tipo de Beneficios</li>
            </ol>
        </div>
    </div>
    <p><label>REGISTRO TIPO DE BENEFICIO</label></p>

    <form>
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="toke" >

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input">Nombre</label><br>
                <input type="text" class="form-control" id="nombre" name="nombre" required="required"
                       placeholder="Ingrese el Nombre" style="width: 100%">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Agregar Nuevo Tipo" class="btn btn-primary btn-sm"
                    id="btn-agregar-tipoBeneficio">
        </div>
    </div>

    </form>

@section('page-js-code')

    <script type="application/javascript">

        $("#btn-agregar-tipoBeneficio").click(function(){
            var nombre = $("#nombre").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/tiposBeneficios',
                data:{
                    nombre:nombre,
                },
                headers:{'X-CSRF-TOKEN': toke},
                dataType:'json',
                type:'POST',
                success:function(data) {
                    toastr.info("El tipo de beneficio " + nombre + " se agrego con exito.","TIPO DE BENEFICIOS");
                    $("#nombre").val('');
                }
            });
        });


    </script>
@stop

@stop