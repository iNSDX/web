$(buscar_ventas());

function buscar_ventas(consulta) {
  $.ajax({
    url: 'php/buscarventas.php',
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
    buscar_ventas(valor);
  }else{
    buscar_ventas();
  }
});

$(document).on('submit', '#insert_venta_form', function(event) {
    event.preventDefault();

      $.ajax({
        url: 'php/nueva_venta.php',
        type: 'POST',
        data: $('#insert_venta_form').serialize(),
        success:function(data){
          $('#insert_venta_form')[0].reset();
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
    var form = '#edit_venta_form-'+id;
    $.ajax({
      type: "POST",
      url: "php/editar_venta.php",
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
  if(confirm("¿ Eliminar la venta ?")){
    $.ajax({
    type: "POST",
    url: "php/borrar_venta.php",
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

function facturaVenta(str){
  var id = str;
  $.ajax({
    url: 'php/nuevaFactura.php',
    type: 'POST',
    data: {id: id}
  })
  .done(function() {
    alert('Factura creada');
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });

}
