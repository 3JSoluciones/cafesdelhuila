@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Medios</li>
            </ol>
        </div>
    </div>
    <p><label>REGISTRO DE MEDIOS</label></p>

    <form>
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="input">Productor</label><br>
                <select name="productor_id" id="productor_id" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($productores as $productor)
                        <option value="{{ $productor->id }}">{{ $productor->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="exampleInputFile">Archivo</label>
                <input type="file" id="nombre" name="nombre">
                <p class="help-block">Por favor seleccione un archivo de su equipo.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Agregar Medio" class="btn btn-primary btn-sm"
                    id="btn-agregar-medio">
        </div>
    </div>

    </form>

    @section('page-js-code')

    <script type="application/javascript">

        $("#nombre").change(function () {
            var file        = this.files[0];
            nombreArchivo   = file.name;
            tamanioArchivo  = file.size;
            tipoArchivo     = file.type;
            $("#nombre").val(nombreArchivo);
        });

        $("#btn-agregar-medio").click(function(){

            var Productor_id    = $("#productor_id").val();
            var nombre          = $("#nombre").val();

            $.ajax({
                url: 'http://cafesdelhuila.com/medios',
                data:{
                    Productor_id:Productor_id,
                    nombre:nombre,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                type:'POST',
                success:function(data) {
                    toastr.info("El medio " + nombre + " se agrego con exito.","REGISTRO DE MEDIOS");
                    self.location = 'http://cafesdelhuila.com/medios/create';
                }
            });
        });


    </script>

    @stop

@stop
