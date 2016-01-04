@extends('layouts.main')

@section('page-css-code')

@stop

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Certificaciones Productores</li>
            </ol>
        </div>
    </div>
    <p><label>REGISTRO DE CERTIFICACIONES DE LOS PRODUCTORES</label></p>

    <form>
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="toke" >

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="input">Productor</label><br>
                <select name="productor_id" id="productor_id" class="form-control" style="width: 100%">
                    <option value="" >Seleccione..</option>

                    @foreach($productores as $productor)
                        <option value="{{ $productor->id }}">{{ $productor->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="input">Certificacion</label><br>
                <select name="certificacion_id" id="certificacion_id" class="form-control" style="width: 100%"
                        >
                    <option value="0">Seleccione..</option>
                    <!--<optgroup label="Grupo de certificaciones">-->
                        @foreach($certificaciones as $certificacion)
                            <option value="{{ $certificacion->id }}">{{ $certificacion->nombre }}</option>
                        @endforeach
                    <!--</optgroup>-->
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Agregar Certificacion al Productor" class="btn btn-primary btn-sm"
                    id="btn-agregar-certificacionProductor">
        </div>
    </div>

    </form>

    @section('page-js-code')

    <script type="application/javascript">

        /*$('#certificacion_id').multiselect({
            enableClickableOptGroups: true
        });*/

        $("#btn-agregar-certificacionProductor").click(function(){

            var Productor_id        = $("#productor_id").val();
            var Certificacion_id    = $("#certificacion_id").val();

            $.ajax({
                url: 'http://cafesdelhuila.com/certificacionesProductores',
                data:{
                    Productor_id:Productor_id,
                    Certificacion_id:Certificacion_id,
                },
                headers:{'X-CSRF-TOKEN': toke},
                dataType:'json',
                type:'POST',
                success:function(data) {
                    toastr.info("Se agrego la ceritficacion al productor.","CERTIFICACIONES DE PRODUCTORES");
                    $("#productor_id").val('');
                    $("#certificacion_id").val('');
                }
            });


        });

    </script>
    @stop

@stop