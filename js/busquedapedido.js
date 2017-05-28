$(buscar_pedidos());

function buscar_pedidos(consulta) {
  $.ajax({
    url: 'php/buscarpedidos.php',
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
    buscar_pedidos(valor);
  }else{
    buscar_pedidos();
  }
});

$(document).on('submit', '#insert_pedido_form', function(event) {
    event.preventDefault();

      $.ajax({
        url: 'php/nuevo_pedido.php',
        type: 'POST',
        data: $('#insert_pedido_form').serialize(),
        success:function(data){
          $('#insert_pedido_form')[0].reset();
          $('#add_data_Modal').modal('hide');
          $('.artadded').slideDown('slow');
          setTimeout(function() {
            window.location.reload(true);
          },1500);
        }
      });
  });

function updateData(str) {
    var id = str;
    var form = '#edit_pedido_form-'+id;
    $.ajax({
      type: "POST",
      url: "php/editar_pedido.php",
      data: $(form).serialize(),
      success: function(){
          $('.artupdated').slideDown('slow');
          setTimeout(function() {
            window.location.reload(true);
          },1500);
      }
    });
}

function deleteData(str){
  var id = str;
  if(confirm("¿ Eliminar el pedido ?")){
    $.ajax({
    type: "POST",
    url: "php/borrar_pedido.php",
    data: {id: id},
    success: function() {
      $('.artdeleted').slideDown('slow');
      setTimeout(function() {
        window.location.reload(true);
      },1500);
    }
  });
  }
}
