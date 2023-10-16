<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
<?php

	
	
    if(isset($_POST['nombre'])) {
		$nombre = $_POST['nombre'];
    }
     
    if(isset($_POST['email'])) {
        $email = $_POST['email'];
    }
     
    if(isset($_POST['titulo'])) {
        $titulo = $_POST['titulo'];
    }
     
    if(isset($_POST['departamento'])) {
        $departamento = $_POST['departamento'];
    }
     
    if(isset($_POST['mensaje'])) {
        $mensaje = $_POST['mensaje'];
    }
     
    if($departamento == "RRHH") {
        $remitente = "markutovich@gmail.com";
    }
    else if($departamento == "Marketing") {
        $remitente = "markutovich@gmail.com";
    }
    else if($departamento == "Soporte") {
        $remitente = "markutovich@gmail.com";
    }
    else {
        $remitente = "markutovich@gmail.com";
    }
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
     
    if(mail($remitente, $titulo, $mensaje, $headers)) {
        echo "<p>Gracias por contactar con nosotros $nombre.</p>";
    } else {
        echo '<p>Error al enviar</p>';
    }

	
	

	
	
?>
</body>
</html>