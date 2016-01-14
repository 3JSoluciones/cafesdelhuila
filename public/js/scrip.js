$(document).ready(function () {

    //activa todos los selects
    $(".select").data("kendoDropDownList");

//activa todos los campos datepicker
    $(".date").kendoDatePicker();

//validaciones para las fechas  y todos los demas campos
    var validator = $(".formValidation").kendoValidator().data("kendoValidator");

//tablas
    $('.tabla').DataTable({
        "language": {
            "url": "/bower_components/jquery/Spanish.json"
        }
    });

    $('#tabla_fincas').DataTable({
        "language": {
            "url": "/bower_components/jquery/Spanish.json"
        }
    });

    $('#tabla_lotes').DataTable({
        "language": {
            "url": "/bower_components/jquery/Spanish.json"
        }
    });

    $('#tabla_certificaciones').DataTable({
        "language": {
            "url": "/bower_components/jquery/Spanish.json"
        }
    });


});