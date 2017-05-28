$(buscar_fac());

function buscar_fac(consulta) {
  $.ajax({
    url: 'php/buscarfacturas.php',
    type: 'POST',
    dataType: 'html',
    data: {consulta: consulta}
  })
  .done(function(respuesta) {
    $('#datos').html(respuesta);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
}

$(document).on('keyup', '#caja_busqueda', function() {
  var valor = $(this).val();
  if(valor != ""){
    buscar_fac(valor);
  }else{
    buscar_fac();
  }
});

function deleteData(str){
  var id = str;
  if(confirm("¿ Eliminar la factura ?")){
    $.ajax({
    type: "POST",
    url: "php/borrar_fac.php",
    data: {id: id},
    success: function() {
      $('.artdeleted').slideDown('slow');
      setTimeout(function() {
        window.setTimeout(function() {
            window.location.replace('facturas.php');
        });
      },1500);
    }
  });
  }
}
