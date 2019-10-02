$(document).ready(function () {
    
    $(window).load(function(){'use strict';
        $(".loader").fadeOut("slow");
    });

    $('#dsc_foto').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top
          }, 800);
          return false;
        }
      }
    });

    $('#exampleModal').on('shown.bs.modal', function(e) {
        $("#twbtn").addClass("twitter-share-button");
    });

    $(window).on('load scroll', function () {
        var scrolled = $(this).scrollTop();
        $('#title').css({
            'transform': 'translate3d(0, ' + -(scrolled * 0.2) + 'px, 0)', // parallax (20% scroll rate)
            'opacity': 1 - scrolled / 400 // fade out at 400px from top
        });
        $('#hero-vid').css('transform', 'translate3d(0, ' + -(scrolled * 0.25) + 'px, 0)'); // parallax (25% scroll rate)
    });
    

    $("video").prop( 'muted', true );

    $("#mute-video").click( function (){
        
        if( $("video").prop( 'muted' ) ) {
            
            $("#volicon").removeClass("fa-volume-mute");
            $("#volicon").addClass("fa-volume-up");
            $("video").prop( 'muted', false );

        } else {
            
            $("#volicon").removeClass("fa-volume-up");
            $("#volicon").addClass("fa-volume-mute");
            $("video").prop('muted', true);
        }

    });

    if ( ( $("#vdsk").length > 0 ) && ( $("#vdsk").length > 0 ) ){
    
        if ( $(window).width() < 992 ) {
            // Mobile video
            $("#vdsk").get(0).pause();
            $("#vmob").get(0).play();
        }
        else if ( $(window).width() > 992 ) {
            // Desktop video
            $("#vmob").get(0).pause();
            $("#vdsk").get(0).play();
        }
    }

    $(".envelope").click( function (){
        if( $("#stenv").val() == "closed" ){ // Foto hacia arriba para salir del sobre
            $( "#foto" ).css( "z-index", 3 );
            TweenMax.staggerTo( "#foto", 2, { y:-300, onComplete:envOut, ease: Expo.easeIn }, 1 );
        }
        if( $("#stenv").val() == "open" ){  // Foto hacia arriba para entrar al sobre
            TweenMax.staggerTo( "#foto", 2, 
            { y:-320, onComplete:envIn, ease: Back.easeIn }, 1 );
        }
    });

    function envOut(tween){
        // Foto hacia abajo para salir del sobre
        $( "#foto" ).css( "z-index", 4 );
        TweenMax.staggerTo( "#foto", 2, { y:0, ease: Back.easeInOut }, 2 );
        $("#stenv").val("open");
    }
    function envIn(tween){
        // Foto hacia abajo para entrar al sobre
        TweenMax.staggerTo( "#foto", 0.85, { y:0, zIndex:2, ease: Expo.easeInOut }, 1 );
        $("#stenv").val("closed");
    }
    
});