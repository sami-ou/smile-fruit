<?php
$name=$_POST['name'];
$email=$_POST['e-direction'];
$phone=$_POST['phone'];
$message=$_POST['message'];

$dest="samioulkadi@gmail.com";
$subject="contacto desde rochaworld.com";

$carta="De: $name \n";
$carta .="Correo: $email \n";
$carta .="Numero de telefono: $phone \n";
$carta .="Mensaje: $message \n";

mail($dest,$subject,$carta);
header('Location:sent-message.html')
?>