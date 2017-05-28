$(buscar_arqueos());

function buscar_arqueos(consulta) {
  $.ajax({
    url: 'php/buscararqueos.php',
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
    buscar_arqueos(valor);
  }else{
    buscar_arqueos();
  }
});

$(document).on('submit', '#insert_arqueo_form', function(event) {
    event.preventDefault();

      $.ajax({
        url: 'php/nuevo_arqueo.php',
        type: 'POST',
        data: $('#insert_arqueo_form').serialize(),
        success:function(data){
          $('#insert_arqueo_form')[0].reset();
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
    var form = '#edit_arqueo_form-'+id;
    $.ajax({
      type: "POST",
      url: "php/editar_arqueo.php",
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
  if(confirm("¿ Eliminar el arqueo ?")){
    $.ajax({
    type: "POST",
    url: "php/borrar_arqueo.php",
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
