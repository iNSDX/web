/*INCLUIR EN INDEX.php
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/additional-methods.min.js"></script>
<script src="js/validacionRegistro.js"></script>
*/
function accountExists () {
  var email=$("#email").val();
  $.ajax({
      type:'post',
          url:'php/checkEmail.php',
          data:{email: email},
          success:function(msg){
          alert(msg);
          }
   });
}



$(function() {

  $.validator.setDefaults({
    errorClass: 'help-block',
    highlight: function(element) {
      $(element)
        //.closest('.form-group')
        .removeClass('has-success');
        .addClass('has-error has-feedback');
        .blur(function(){
        $("#iconok").remove();
        });
        .append('<span id="iconwrong" class="glyphicon glyphicon-remove form-control-feedback"></span>');
    },
    unhighlight: function(element) {
      $(element)
        //.closest('.form-group')
        .removeClass('has-error');
        .addClass('has-success has-feedback');
        .blur(function(){
        $("#iconwrong").remove();
        });
        .append('<span id="iconok" class="glyphicon glyphicon-ok form-control-feedback"></span>');
    },
    errorPlacement: function (error, element) {
      if (element.prop('type') === 'checkbox') {
        error.insertAfter(element.parent());
      } else {
        error.insertAfter(element);
      }
    }
  });

  $.validator.addMethod('strongPassword', function(value, element) {
    return this.optional(element)
      || value.length >= 6
      && /\d/.test(value)
      && /[A-Z]/.test(value)
      && /[a-z]/i.test(value);
  }, 'La contraseña debe tener al menos 6 caracteres y contener al menos un número,una minúscula y una mayúscula\'.')

  $("#register-form").validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        strongPassword: true
      },
      password_confirmation: {
        required: true,
        equalTo: '#password'
      },
      nombre: {
        required: true,
        lettersonly: true
      },
      apellidos: {
        required: true,
        lettersonly: true
      },
      fechaNacimiento: {
        required: true
      },
    },
    messages: {
      email: {
        required: 'Rellene este campo.',
        email: 'Por favor introduzca un email <em>válido</em>.'
      }
      password: {
        required: 'Rellene este campo.',
      }
      password_confirmation: {
        required: 'Rellene este campo.',
        equalTo: 'Contraseña no coincide.'
      }
      nombre: {
        required: 'Rellene este campo.',
        lettersonly: 'Nombre no válido.'
      }
      apellidos: {
        required: 'Rellene este campo.',
        lettersonly: 'Apellidos no válidos.'
      }
      fechaNacimiento: {
        required: 'Rellene este campo.'
      }
    }
  });

});
