<!-- SOLO FUNCIONA EN SERVIDOR WEB, LOCALHOST NO TIENE MAILSERVER -->
<?php

$email_to = "gestanco@protonmail.com";

$email_subject = "Contacto desde Gestanco";

$first_name = $_POST['fname'];

$last_name = $_POST['lname'];

$email_from = $_POST['email'];

$telephone = $_POST['phone'];

$message = $_POST['message'];

$email_message = "Contenido del Mensaje.\n\n";

function clean_string($string) {

     $bad = array("content-type","bcc:","to:","cc:","href");

     return str_replace($bad,"",$string);
}

$email_message .= "Nombre: ".clean_string($first_name)."\n";

$email_message .= "Apellido: ".clean_string($last_name)."\n";

$email_message .= "Email: ".clean_string($email_from)."\n";

$email_message .= "Teléfono: ".clean_string($telephone)."\n";

$email_message .= "Mensaje: ".clean_string($message)."\n";

ini_set("SMTP","smtp.gmail.com");
ini_set("smtp_port",587);
ini_set("sendmail_from",$email_from);

//Encabezados del correo

$headers = 'From: '.$email_from."\r\n".'Reply-To: '.$email_from."\r\n".'X-Mailer: PHP/'.phpversion();

@mail($email_to, $email_subject, $email_message, $headers);

if (mail($email_to, $email_subject, $email_message, $headers)) {
echo "<script language='javascript'>
alert('Mensaje enviado, muchas gracias.');
window.location.href = 'http://www.gestanco.com';
</script>";
} else {
echo 'Falló el envio';
}

?>
