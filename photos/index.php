<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Gabrielle Chanel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gabrielle. La esencia de una mujer">
    <meta name="keywords" content="Gabrielle,Chanel,esencia,mujer">
    <meta name="author" content="">

    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<![endif]-->


    <!-- CSS Files
    ================================================== -->
    <link rel="stylesheet" href="../css/main.css" type="text/css">
    <link rel="stylesheet" href="../css/gabrielle.css" type="text/css">
    
    <link rel="stylesheet" href="../css/all.css" type="text/css">
    <link rel="stylesheet" href="../css/universal-parallax.min.css" type="text/css">

    <!-- Javascript Files
    ================================================== -->
    <script src="../js/jquery-2.1.4.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.isotope.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/easing.js"></script>
    <script src="../js/jquery.ui.totop.js"></script>
    <script src="../js/ender.js"></script>
    <script src="../js/jquery.flexslider-min.js"></script>
    <script src="../js/jquery.scrollto.js"></script> 
    <script src="../js/designesia.js"></script>
    <script src="../js/validation.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <script src="../js/chanel.js"></script>


    <!-- SLIDER REVOLUTION SCRIPTS  -->
    <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="js/rev-setting-1.js"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <script type="text/javascript">
        var socialtx = 'Hoy conocí Gabrielle CHANEL Essence en xxx. La esencia de una mujer'
        var urltext = encodeURIComponent( socialtx );
    </script>
    <style type="text/css">
        .aleft{ text-align: left; }

        .container--full {
            width: 100%;
            height: 100vh;
        }

        .social_inv p{
          font-size: 10px; padding:10px 0; 
        }

        ul#foto-acciones li {
          display:inline;
        }

        #foto-acciones a{ color: #b98c3e }
        #foto-acciones a:hover{ color: #f0c06b }
       
    </style>
</head>

<body id="homepage">

    <div id="wrapper">
        
        
        <!-- Ingreso de código -->
        <div id="entercode" class="sectionphoto">
            <div class="row nomargin">
                <div class="col-md-4 col-xs-12 col-sm-12"></div>
                <div class="col-md-4 col-xs-12 col-sm-12 text-center wow fadeIn" 
                    data-wow-duration="500ms" data-wow-delay="300ms">
                    <img src="../images/GABRIELLE CHANEL.png" class="gabrielle_logo">
                    <img src="../images/essence.png">
                    <p>GABRIELLE. LA ESENCIA DE UNA MUJER</p>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-12"></div>
            </div>
          <div class="parallax" data-parallax-image="../images/Gabrielle-essence.png"></div>
        </div>
        <!-- /.Ingreso de código -->

        <!-- Descripción Chanel Gabrielle -->
        <section id="chanel_desc" data-speed="8" data-type="background">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-12 col-sm-12"></div>
                    <div class="col-md-4 col-xs-12 col-sm-12">
                        <form class="form-horizontal form-bordered" id="envio_foto" 
                        onSubmit="return false">
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label aleft" for="codigo">Código</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="codigo" name="codigo" readonly value="GA02513">
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label class="col-md-3 control-label aleft" for="foto">Foto</label>
                                <div class="col-md-9">
                                    <input type="file" name="foto" class="form-control" required>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Nombre</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="nombre" 
                                    name="nombre" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="apellido">Apellido</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="email">Email</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="" required>
                                    Acepto los términos y condiciones
                                </label>
                            </div>
                            
                        
                            <div class="form-group" style="padding: 40px" align="center">
                              <button type="submit" class="btn-white bounce-green" id="btn_submit" data-toggle="modal" data-target="#exampleModal"> Enviar</button>
                            </div>
                    
                        </form>
                    </div>
                    <div class="col-md-4 col-xs-12 col-sm-12"></div>
                </div>
            </div>
        </section>
        <!-- /.Descripción Chanel Gabrielle -->

    </div>

    <script src="../js/universal-parallax.min.js"></script>
    <script>
        
        new universalParallax().init({
            speed: 4
        });

        var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;

        if( iOS ){
            var imageUrl = "images/gabrielle.gif";
            $(".webcnt").remove();
            $('.bgmain').css('background-image', 'url(' + imageUrl + ')');
            //$(".iostop").css('display','block');
        }else{
            //$("#hometop").css('display','block');
            $(".iostop").remove();
        }
    </script>
    
</body>
</html>