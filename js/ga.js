/**
* Función que realiza un seguimiento de un clic en un enlace saliente en Analytics.
* Esta función toma una cadena de URL válida como argumento y la utiliza
* como la etiqueta del evento. Configurar el método de transporte como "beacon" permite que el hit se envíe
* con "navigator.sendBeacon" en el navegador que lo admita.
*/

    window.dataLayer = window.dataLayer || [];
    function gtag(){ 
        dataLayer.push(arguments); 
    }
    gtag( 'js', new Date() );
    gtag( 'config', 'UA-118040064-1' );

    /* ---------------------------------------- */
    // Seguimiento botón: Buscar foto por código: #btn_submit 
    var gaClic = function( ctg, lbl ) {
        gtag('event', 'clic', {
          'event_category' : ctg,
          'event_label' : lbl
        });
    }
    /* ---------------------------------------- */