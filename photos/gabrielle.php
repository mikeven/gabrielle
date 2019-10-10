<?php	
	/* CUPFSA - Gabrielle Chanel 
     *
     * Envío de mensaje código e imagen por email
     *
     */

    $codigo			 	= $_POST["codigo"];
	$nombre			 	= $_POST["nombre"];
	$apellido 			= $_POST["apellido"];
	$email 				= $_POST["email"];

	$asunto 			= "Descubra su foto";

    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $cabeceras .= "From: Gabrielle Essence <gabrielleessence@cupfsa.com>";

    $contenido = file_get_contents( "photos/mailing.html" );
    $contenido = str_replace( "{codigo}", strtoupper( $codigo ), $contenido );
    $contenido = str_replace( "{nombre}", strtoupper( $nombre ), $contenido );
    sleep(3);
    echo 1;//mail( $email, $asunto, $contenido, $cabeceras );
?>