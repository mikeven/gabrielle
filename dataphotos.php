<?php	
	/* CUPFSA - Gabrielle Chanel 
     *
     * Obtención de las imágenes de participantes
     *
     */

    /* ================================================================= */
    function obtenerFoto( $dbh, $code ){
        // Devuelve el registro asociado a una imagen de un participante dado el código
        $q = "select * from participante where codigo = '$code'";
        return mysqli_fetch_array( mysqli_query( $dbh, $q ) ); 
    }
    /*-------------------------------------------------------------------*/
    function marcarImagenAbierta( $dbh, $codigo ){
        // Actualiza el registro de imagen para indicar que fue abierta
        $q = "update participante set abierta = 'SI' where codigo = '$codigo'";
        mysqli_query( $dbh, $q ); 
    }
    /*-------------------------------------------------------------------*/
    function obtenerFotoPorDefecto( $dbh ){
        // Devuelve el registro de imagen por defecto para mostrar en la página de inicio
        $foto = array(  "nombre"    => "Gabrielle",
                        "apellido"  => "Chanel", 
                        "email"     => "",
                        "imagen"    => "https://gabrielleessence.cupfsa.com/images/chanel-woman.jpg" 
        );

        return $foto; 
    }
    /*-------------------------------------------------------------------*/
    function generarArchivoUrl( $foto ){
        // Genera un archivo con la imagen
        
        $filename   = "photo$foto[codigo].html";
        $content    = file_get_contents( "photo.html" );
        $url        = "https://gabrielleessence.cupfsa.com/shares/".$filename;
        $urlimg     = "https://gabrielleessence.cupfsa.com/uploads/$foto[imagen]";
        $urlimgcss  = trim( $urlimg );

        $content    = str_replace( "{{url}}", $url, $content );
        $content    = str_replace( "{{locacion}}", $foto["locacion"], $content );
        $content    = str_replace( "{{url_img}}", $urlimg, $content );
        $content    = str_replace( "{{url_img_css}}", $urlimgcss, $content );
        
        $handle     = fopen( 'shares/'.$filename,'w+' ); 
        fwrite( $handle, $content ); 
        fclose( $handle );

        return $url;
    }
    /*-------------------------------------------------------------------*/
    function lnkTw( $u, $l ){

        $lnktw = "https://twitter.com/intent/tweet?url=$u&text=Hoy%20conocí%20Gabrielle%20CHANEL%20Essence%20en%20$l.%20GABRIELLE.%20La%20esencia%20de%20una%20mujer";

        return $lnktw;
    }
    /*-------------------------------------------------------------------*/
    function lnkMail( $u, $l ){
        //$l = urlencode( $l );
        //$u = urlencode( $u );
        $lnkmail = "mailto:mikeven@gmail.com?subject=Gabrielle%20Chanel&body=Hoy conocí Gabrielle CHANEL Essence en $l.GABRIELLE. La esencia de una mujer $u";

        return $lnkmail;
    }
    /*-------------------------------------------------------------------*/
    if ( isset( $_POST["code"] ) ){
        include( "database/bd.php" );
        
        $data["codigo"]     = $_POST["code"];
        $foto               = obtenerFoto( $dbh, $data["codigo"] );
        $urlshare           = generarArchivoUrl( $foto );

        if( $foto ){
            marcarImagenAbierta( $dbh, $data["codigo"] );
            $res["exito"]   = 1;
            $res["reg"]     = $foto;
            $res["lnkfb"]   = "https://www.facebook.com/sharer/sharer.php?u=$urlshare&amp;src=sdkpreparse";
            $res["lnktw"]   = lnkTw( $urlshare, $foto["locacion"] );
            $res["lnkmail"] = lnkMail( $urlshare, $foto["locacion"] );
            $res["lnkimg"]  = $urlshare;
        }else{
            $res["exito"]   = -1;
            $res["mje"]     = "No se encontró foto con este código";
        }
        
        echo json_encode( $res, JSON_UNESCAPED_SLASHES );
    }
    /*-------------------------------------------------------------------*/
?>