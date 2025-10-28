<?php
$to = "contacto@symbiot.com.mx";
$subject = "Contacto desde Pagina Web de Symbiot";
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$message = $_POST["message"];
$thank = "thankyou.html";
$error = "error.html";
$complete = "complete.html";

if ($name == "" AND $email == "" AND $phone == "" AND $message == "") {
  Header("Location: $complete");
}
else{
  $header = "Mime-Version: 1.0; \r\n";
  $header .= "Content-Type: text/html; charset=iso-8859-1; \r\n"; 
  $header .= "From: $email \r\n";
  $header .= "X-Mailer: PHP/" . phpversion();

  $mensaje = 'Este mensaje fue enviado por:' . $name ."\r\n";
  $mensaje .= 'Su e-mail es:' . $email . "\r\n";
  $mensaje .= 'Mensaje: ' . $_POST["message"] . " \r\n";
  $mensaje .= 'Enviado el ' .date('d/m/Y', time());

    if (mail($to, $subject, $message, $header)) 
   { Header("Location: $thank");
  }
    else 
   { Header("Location: $error");
  }
}
?>
