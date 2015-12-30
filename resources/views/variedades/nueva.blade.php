@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Variedades</li>
            </ol>
        </div>
    </div>
    <p><label>REGISTRO DE VARIEDADES</label></p>

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
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Acidez</label><br>
                    <select name="acidez_id" id="acidez_id" class="form-control" style="width: 100%">
                        <option value="">Seleccione..</option>

                        @foreach($acidezes as $acidez)
                            <option value="{{ $acidez->id }}">{{ $acidez->nombre }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Aroma</label><br>
                    <select name="aroma_id" id="aroma_id" class="form-control" style="width: 100%">
                        <option value="">Seleccione..</option>

                        @foreach($aromas as $aroma)
                            <option value="{{ $aroma->id }}">{{ $aroma->nombre }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Sabor</label><br>
                    <select name="sabor_id" id="sabor_id" class="form-control" style="width: 100%">
                        <option value="">Seleccione..</option>

                        @foreach($sabores as $sabor)
                            <option value="{{ $sabor->id }}">{{ $sabor->nombre }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
        </div>

        <input type="hidden" id="Variedadescol" value="<?php echo date('Y-m-d H:i:s'); ?>">

    <div class="row">
        <div class="col-lg-12 text-right">
                <input type="button" value="Agregar Variedad" class="btn btn-primary btn-sm"
                        id="btn-agregar-variedad">
        </div>
    </div>

    </form>

    @section('page-js-code')

    <script type="application/javascript">

        $("#btn-agregar-variedad").click(function(){

            var Acidez_id       = $("#acidez_id").val();
            var Aroma_id        = $("#aroma_id").val();
            var Sabor_id        = $("#sabor_id").val();
            var nombre          = $("#nombre").val();
            var Variedadescol   = $("#Variedadescol").val();

            $.ajax({
                url: 'http://cafesdelhuila.com/variedades',
                data:{
                    Acidez_id:Acidez_id,
                    Aroma_id:Aroma_id,
                    Sabor_id:Sabor_id,
                    nombre:nombre,
                    Variedadescol:Variedadescol,
                },
                headers:{'X-CSRF-TOKEN': toke},
                dataType:'json',
                type:'POST',
                success:function(data) {
                    toastr.info("La variedad " + nombre + " se agrego con exito.","VARIEDADES");
                    $("#acidez_id").val('');
                    $("#aroma_id").val('');
                    $("#sabor_id").val('');
                    $("#nombre").val('');
                }
            });
        });

    </script>
    @stop

@stop