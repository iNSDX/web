$(buscar_cont());

function buscar_cont(consulta) {
  $.ajax({
    url: 'php/buscarcontactos.php',
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

function deleteData(str){
  var id = str;
  if(confirm("¿ Eliminar el contacto ?")){
    $.ajax({
    type: "POST",
    url: "php/borrar_cont.php",
    data: {id: id},
    success: function() {
      $('.artdeleted').slideDown('slow');
      setTimeout(function() {
        window.setTimeout(function() {
            window.location.replace('vercontactos.php');
        });
      },1500);
    }
  });
  }
}
