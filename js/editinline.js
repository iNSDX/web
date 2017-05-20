$(document).on('submit', '#insert_form', function(event) {
    event.preventDefault();

      $.ajax({
        url: 'php/procesar_nuevo_articulo.php',
        type: 'POST',
        data: $('#insert_form').serialize(),
        success:function(data){
          $('#insert_form')[0].reset();
          $('#add_data_Modal').modal('hide');
          $('#datos').html(data);
          $('.artadded').slideDown('slow');
          setTimeout(function() {
            $('.artadded').slideUp('slow');
          },2000);
        }
      });
});

function updateData(str) {
  var id = str;
  var form = '#edit_form-'+id;
  $.ajax({
    type: "POST",
    url: "php/editar_art.php",
    data: $(form).serialize(),
    success: function(){
        $('.artupdated').slideDown('slow');
        setTimeout(function() {
          window.setTimeout(function() {
              window.location.replace('inventario.php');
          });
        },1500);
    }
  });
}

function deleteData(str){
  var id = str;
  if(confirm("¿ Eliminar el artículo ?")){
    $.ajax({
    type: "POST",
    url: "php/borrar_art.php",
    data: {id: id},
    success: function() {
      $('.artdeleted').slideDown('slow');
      setTimeout(function() {
        window.setTimeout(function() {
            window.location.replace('inventario.php');
        });
      },1500);
    }
  });
  }
}
