
$(document).ready(function() {

     $('#tbl-usuarios').DataTable({
            bDestroy: true,
            paging: true,
            lengthChange: false,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            language: {
                  url: "scripts/es.json"
            },
            ajax: {
                 url : './classes/class_usuarios.php',
                 type: "GET",
                  beforeSend: (xhr) => {
                        toastr.info('Cargando..')
                  },
                  complete: (data) => {
                        toastr.hideToast()
                  },
                  data: {
                        "state": "listarUsuarios"
                  },
            }, 
            initComplete: function(settings, json) {},
            orderCellsTop: true,
            fixedHeader: true,
        
      });


    
});

$(document).on("click","#generar", function(e) {
      var state         = "Generar";
      var params        = '&state='+state;
      $.post('./classes/class_usuarios.php', params, function(jsondata){                
            if(jsondata.validacion == 'exito'){ 
                  toastr.success(jsondata.mensaje)
                  setTimeout(function(){
                        $("#tbl-usuarios").DataTable().ajax.reload();
                  }, 1400);
            }
            if(jsondata.validacion == 'error'){                   
                  toastr.error(jsondata.mensaje)
            }
      },'json');
});

$(document).on("click", ".modificarUsuarios", function(e){
      var id            = $(this).data("id");
      var nombre        = $(this).data("nombre");
      var apellido      = $(this).data("apellido");
      var edad          = $(this).data("edad");


      $('#id_modificar').val(id);
      $('#nombre_modificar').val(nombre);
      $('#apellido_modificar').val(apellido);
      $('#edad_modificar').val(edad);

});


$(document).on("click","#modificar", function(e) {
      if(validarModificar()){
            var id                         = $('#id_modificar').val();
            var nombre                     = $('#nombre_modificar').val();
            var apellido                   = $('#apellido_modificar').val();
            var edad                       = $('#edad_modificar').val();

            var state         = "Modificar";
            var params        = '&id='+id+'&nombre_modificar='+nombre+'&apellido_modificar='+apellido+'&edad_modificar='+edad+'&state='+state;        
            
            $.post('./classes/class_usuarios.php', params, function(jsondata){                  
                  if(jsondata.validacion == 'exito'){ 
                        toastr.success(jsondata.mensaje)
                        setTimeout(function(){
                              $("#tbl-usuarios").DataTable().ajax.reload();
                              $('#modificarUsuarios').modal('hide');
                        }, 1400);
                  }
                  if(jsondata.validacion == 'error'){                   
                        toastr.error(jsondata.mensaje)
                  }
            },'json');
      }else{
            e.preventDefault();
            return false;
      }
});

$(document).on("click", ".eliminarUsuarios", function(e){
      var id            = $(this).data("id");
      $('#id_eliminar').val(id);
});

$(document).on("click","#eliminar", function(e) {
            var id                         = $('#id_eliminar').val();

            var state         = "Eliminar";
            var params        = '&id='+id+'&state='+state;        
            
            $.post('./classes/class_usuarios.php', params, function(jsondata){                  
                  if(jsondata.validacion == 'exito'){ 
                        toastr.success(jsondata.mensaje)
                        setTimeout(function(){
                              $("#tbl-usuarios").DataTable().ajax.reload();
                              $('#eliminarUsuarios').modal('hide');
                        }, 1400);
                  }
                  if(jsondata.validacion == 'error'){                   
                        toastr.error(jsondata.mensaje)
                  }
            },'json');
     
});

function validarModificar(){
      if ($('#nombre_modificar').val() == '') {
            toastr.error('El nombre es requerido')
            $('#nombre_modificar').focus();
            return false;
      }
      if ($('#apellido_modificar').val() == '') {
            toastr.error('El apellido es requerido')
            $('#apellido_modificar').focus();
            return false;
      }
      if ($('#edad_modificar').val() == '') {
            toastr.error('La edad es requerida')
            $('#edad_modificar').focus();
            return false;
      }
      return true;
}