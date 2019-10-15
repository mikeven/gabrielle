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
    if ( isset( $_POST["code"] ) ){
        include( "database/bd.php" );
        
        $data["codigo"] = $_POST["code"];
        $foto = obtenerFoto( $dbh, $data["codigo"] );

        if( $foto ){
            $res["exito"] = 1;
            $res["reg"] = $foto;
            
        }else{
            $res["exito"] = -1;
            $res["mje"] = "No se encontró foto con este código";
        }
        
        echo json_encode( $res );
    }
    /*-------------------------------------------------------------------*/
?>