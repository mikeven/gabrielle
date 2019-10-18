<?php	
	/* CUPFSA - Gabrielle Chanel 
     *
     * Envío de mensajes por email y registro de participantes
     *
     */

    /* ================================================================= */
    function generarCodigo(){
        // Generación de código asociado a imagen de participante

        $let = substr( str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3 ); 
        $num = substr( str_shuffle("0123456789"), 0, 3 );
        
        return $let.$num;
    }
    /* ----------------------------------------------------------------- */
    function guardarParticipante( $dbh, $p ){
        // Registro en bd de los datos del participante
        $q = "insert into participante ( nombre, apellido, codigo, email, locacion, 
        imagen, fecha, abierta ) values ( '$p[nombre]', '$p[apellido]', '$p[codigo]', '$p[email]', 
        '$p[locacion]', '$p[imagen]', NOW(), 'NO' )";
        
        $data = mysqli_query( $dbh, $q );
        return mysqli_insert_id( $dbh );
    }
    /* ----------------------------------------------------------------- */
    function guardarArchivoImagen( $img, $data ){
        // Carga de imagen en servidor => obtención de nombre de archivo
        
        $uploads_dir = "uploads";
        $nombreimg = trim( $data["nombre"].$data["apellido"] );

        $tmp_name   = $img["foto"]["tmp_name"];
        $file_name  = $img["foto"]["name"];
        $file_name  = preg_replace( '/\\.[^.\\s]{3,4}$/', '', $file_name );

        $ext = pathinfo( $img['foto']['name'], PATHINFO_EXTENSION );

        $add = "";
        $archivo = $nombreimg . $add . "." . $ext;
       
        while( file_exists( "$uploads_dir/$archivo" ) ){
            if( $add == "" ) $add = 0;
            $add += 1;
            $archivo = $nombreimg . $add . "." . $ext;
        }

        move_uploaded_file( $tmp_name, "$uploads_dir/$archivo" );

        return $archivo;
    }
    /* ------------------------------------------------------------------ */
    
	$data["nombre"]        = $_POST["nombre"];
	$data["apellido"]      = $_POST["apellido"];
	$data["email"]         = $_POST["email"];
    $data["locacion"]      = $_POST["locacion"];
    $data["codigo"]        = generarCodigo();

    /*-------------------------------------------------------------------*/

    $data["imagen"] = guardarArchivoImagen( $_FILES, $data );

    /*-------------------------------------------------------------------*/

    include( "database/bd.php" );
    guardarParticipante( $dbh, $data );

    /*-------------------------------------------------------------------*/

    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $cabeceras .= "From: Gabrielle Essence <gabrielleessence@cupfsa.com>";

    $contenido = file_get_contents( "photos/mailing.html" );
    $contenido = str_replace( "{codigo}", strtoupper( $data["codigo"] ), $contenido );
    $contenido = str_replace( "{nombre}", strtoupper( $data["nombre"] ), $contenido );

    $asunto    = "Descubra su foto. Descubra GABRIELLE CHANEL ESSENCE";

    mail( $data["email"], $asunto, $contenido, $cabeceras );

    echo json_encode( $data );

    /*-------------------------------------------------------------------*/
?>