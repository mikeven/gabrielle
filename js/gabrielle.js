


(function() {
    'use strict';
    
    //$("video").prop( 'muted', false );
    
    $(window).load(function(){'use strict';
        $(".loader").fadeOut("slow");
     
    });

    $("#mute-video").click( function (){
        
        if( $("video").prop( 'muted' ) ) {
            
            $("#volicon").removeClass("fa-volume-mute");
            $("#volicon").addClass("fa-volume-up");
            $("video").prop( 'muted', false);

        } else {
            
            $("#volicon").removeClass("fa-volume-up");
            $("#volicon").addClass("fa-volume-mute");
            $("video").prop('muted', true);
        }

    });

    $('#exampleModal').on('show.bs.modal', function() {
        $("#btn_submit").fadeOut();
    });

    $(".envelope").click( function (){
        TweenMax.staggerTo( "#foto", 3, 
            { y:-250, delay:8, onComplete:tweenComplete, ease:Back.easeIn}, 1.5 );
    });

    function tweenComplete(tween){
        $( "#foto" ).css( "z-index", 4 );
        TweenMax.staggerTo( "#foto", 2, { y:0, delay:2, ease:Back.easeInOut }, 2 );
    }

    

    if ( $(window).width() < 1000 ) {
        var videoFile = 'video/1080x1920_TEH_GABRIELLE-LESSENCE.mp4';
        $('#gabvid').attr('src', videoFile );
    }
    else if ( $(window).width() > 1000 ) {
        var videoFile = 'video/1920x1080_POS_GABRIELLE-LESSENCE.mp4';
        $('#gabvid').attr( 'src', videoFile );
    }

    
    

}).apply( this, [ jQuery ]);