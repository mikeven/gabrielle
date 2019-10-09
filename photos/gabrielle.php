<?php	
	$codigo			 	= $_POST["codigo"];
	$nombre			 	= $_POST["nombre"];
	$apellido 			= $_POST["apellido"];
	$email 				= $_POST["email"];

	$asunto 			= "Descubra su foto";

    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $cabeceras .= "From: Gabrielle Essence <gabrielleessence@cupfsa.com>";

    $contenido = file_get_contents( "photos/mailing.html" );
    $contenido = str_replace( "{codigo}", $codigo, $contenido );
    $contenido = str_replace( "{nombre}", $nombre, $contenido );

    //print_r($_POST);
    
    echo mail( $email, $asunto, $contenido, $cabeceras );
?>