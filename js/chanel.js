$(document).ready(function () {
    
    $(window).load(function(){'use strict';
        $(".loader").fadeOut("slow");
     
    });

    $(window).on('load scroll', function () {
        var scrolled = $(this).scrollTop();
        $('#title').css({
            'transform': 'translate3d(0, ' + -(scrolled * 0.2) + 'px, 0)', // parallax (20% scroll rate)
            'opacity': 1 - scrolled / 400 // fade out at 400px from top
        });
        $('#hero-vid').css('transform', 'translate3d(0, ' + -(scrolled * 0.25) + 'px, 0)'); // parallax (25% scroll rate)
    });
    
    // video controls
    $('#state').on('click', function () {
        var video = $('#hero-vid').get(0);
        var icons = $('#state > span');
        $('#overlay').toggleClass('fade');
        if (video.paused) {
            video.play();
            icons.removeClass('fa-play').addClass('fa-pause');
        } else {
            video.pause();
            icons.removeClass('fa-pause').addClass('fa-play');
        }
    });

    $("video").prop( 'muted', true );

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

    if ( $(window).width() < 1000 ) {
        var videoFile = 'video/1080x1920_TEH_GABRIELLE-LESSENCE.mp4';
        $('#gabvid').attr('src', videoFile );
    }
    else if ( $(window).width() > 1000 ) {
        var videoFile = 'video/1920x1080_POS_GABRIELLE-LESSENCE.mp4';
        $('#gabvid').attr( 'src', videoFile );
    }
});