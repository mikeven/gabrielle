<?php
  /* --------------------------------------------------------- */
  /* CBC - Funciones para envíos de email */
  /* --------------------------------------------------------- */
  /* --------------------------------------------------------- */
  function obtenerCabecerasMensaje(){
    //Devuelve las cabecera 
    $email_from = "mrangel@mgideas.net";
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $cabeceras .= "From: Coco Beauty Club <$email_from>";

    return $cabeceras;
  }
  /* --------------------------------------------------------- */
  function obtenerPlantillaMensaje( $accion ){
    //Devuelve la plantilla html de acuerdo al mensaje a ser enviado
    $archivos = array(
      "nueva_reservacion"         => "nueva_reservacion.html",
      "cancelacion_reservacion"   => "cancelacion_reservacion.html",
      "recordatorio_actividad"    => "recordatorio_actividad.html"
    );

    $archivo = $archivos[$accion];
    return file_get_contents( "../fn/mailing/".$archivo );
  }
  /* --------------------------------------------------------- */
  function mensajeNuevaReservacion( $plantilla, $datos ){
    //Llenado de mensaje para plantilla de nuevo usuario
    $server = "http://cocobeautyclub.com/";
    $url_cancelacion = $server."/cancelar_reserva.php?tr=".$datos["token"];
    
    $plantilla = str_replace( "{url_cancelacion}", $url_cancelacion, $plantilla );
    $plantilla = str_replace( "{nombre}", $datos["nombre"], $plantilla );
    $plantilla = str_replace( "{apellido}", $datos["apellido"], $plantilla );
    $plantilla = str_replace( "{actividad}", $datos["nactividad"], $plantilla );
    $plantilla = str_replace( "{fecha_y_hora}", $datos["fecha_act"], $plantilla );
    
    return $plantilla;
  }
  /* --------------------------------------------------------- */
  function escribirMensaje( $tmensaje, $plantilla, $datos ){
    //Sustitución de elementos de la plantilla con los datos del mensaje
    
    if( $tmensaje == "nueva_reservacion" ){
      $sobre["asunto"] = "Reservación en Coco Beauty Club";
      $sobre["mensaje"] = mensajeNuevaReservacion( $plantilla, $datos );
    }

    if( $tmensaje == "cancelacion_reservacion" ){
      $sobre["asunto"] = "Reservación cancelada";
      $sobre["mensaje"] = mensajeCancelacionReservacion( $plantilla, $datos );
    }

    if( $tmensaje == "recordatorio_actividad" ){
      $sobre["asunto"] = "Recordatorio Coco Beauty Club";
      $sobre["mensaje"] = mensajeRecordarActividad( $plantilla, $datos );
    }

    return $sobre; 
  }
  /* --------------------------------------------------------- */
  function enviarMensajeEmail( $tipo_mensaje, $datos, $email ){
    //Construcción del mensaje para enviar por email
    
    $cabeceras = obtenerCabecerasMensaje();
    $plantilla = obtenerPlantillaMensaje( $tipo_mensaje );
    $envio = escribirMensaje( $tipo_mensaje, $plantilla, $datos );
    print_r( $envio["mensaje"] );
    //mail( $email_receiver, $envio["asunto"], $envio["mensaje"], $cabeceras );
  }
  /* --------------------------------------------------------- */
?>