  //configuracion de las notificaciones
      function msg() {

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "300",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "slideDown",
                "hideMethod": "slideUp"
              };

        };

  $("#btn-agregar-departamento").click(function(){
      var nombre = $("#nombre").val();
      $.ajax({
          url: 'http://cafesdelhuila.com/departamentos',
          data:{
              nombre:nombre,
          },
          headers:{'X-CSRF-TOKEN': toke},
          dataType:'json',
          type:'POST',
          success:function(data) {

          }
      });
  });
