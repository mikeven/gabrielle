<?php   
    /* Gabrielle Chanel - Formulario participante 
     *
     * Carga de la imagen y datos del participante según locación
     *
     */

    $locacion = "";
    if( isset( $_GET["loc"] ) ){
        $locaciones = array( "chi" => "Parque Arauco Plaza - Los Cristales", 
                             "par" => "Shopping El Sol - Plaza Central" 
                    ); 
        $locacion = $locaciones[ $_GET["loc"] ];
    }
?>
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
    <!--<script src="../js/designesia.js"></script>-->
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
        section { padding: 20px 0 20px 0 !important; }
        .aleft{ text-align: left; }

        .container--full {
            width: 100%;
            height: 100vh;
        }

        #envio_exito{ display:none; color: #b98c3e; }
        #envio_exito a, .verdisclaimer { color: #000 !important; }
        #envio_exito a:hover { color: #b98c3e; }

        .social_inv p{
          font-size: 10px; padding:10px 0; 
        }

        ul#foto-acciones li {
          display:inline;
        }

        #foto-acciones a{ color: #b98c3e }
        #foto-acciones a:hover{ color: #f0c06b }

        .form-horizontal .control-label {
            text-align: left !important;
        }

        #disclaimer{ display: none; }
        #disclaimer p { line-height: 1.6em; font-size: 12px; text-align: center; }

        #envio_foto input[type=text], #envio_foto input[type=email]{
            padding: 25px;
            border: 1px solid #000;
        }.gabform { padding: 12px; border: 1px solid #000; width: 100%; }
       
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
                    <div class="col-md-3 col-xs-12 col-sm-12"></div>
                    <div class="col-md-6 col-xs-12 col-sm-12">
                        <div align="center" style="padding: 15px 0"><label class="control-label"><?php echo $locacion; ?></label></div>
                        <form class="form-horizontal form-bordered" id="envio_foto" onSubmit="return false">
                            
                            <input type="hidden" name="locacion" value="<?php echo $locacion; ?>">
                            
                            <div class="form-group">
                                <label class="col-md-4 control-label aleft" for="foto">Foto</label>
                                <div class="col-md-8">
                                    <input type="file" name="foto" class="form-control" required style="border: 0">
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="inputDefault">Nombre</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="nombre" 
                                    name="nombre" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="apellido">Apellido</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Email</label>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email"></label>
                                <div class="col-md-8" style="font-size: 12px;">
                                    <input type="checkbox" value="" required>
                                    <a href="#!" class="verdisclaimer">Acepto los términos y condiciones</a>
                                </div>
                            </div>

                            
                            <div id="disclaimer">
                                <p>De conformidad con la Ley Nº 18.331, de Protección de Datos Personales y Acción de Habeas Data, de 11 de agosto de 2008, los datos suministrados a partir del 17 de diciembre quedarán incorporados en la Base de Datos “Clientes Chanel”, la cual será procesada exclusivamente para agendar su cita en el COCO BEAUTY CLUB. Esos datos se recogerán a través de medios legítimos y sólo serán los imprescindibles para poder prestar el servicio requerido. Los datos personales serán tratados con el grado de protección adecuado, tomándose las medidas de seguridad necesarias para evitar su alteración, pérdida, tratamiento o acceso no autorizado por parte de terceros. El responsable de la Base de Datos es (Bylasol S.A.) y la dirección donde el titular podrá ejercer los derechos de acceso, rectificación, actualización, inclusión o supresión es Ruta 101 Km 26.200, Canelones".</p>
                            </div>
                        
                            <div class="form-group" style="padding: 40px" align="center">
                              <button id="enviar_img" type="submit" class="btn-white bounce-green"> Enviar</button>
                            </div>
                        </form>
                        
                        <div id="envio_exito" align="center">
                            <span>Mensaje enviado con éxito</span>
                            <div>
                                <a href="javascript:history.go(0)">Volver</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12 col-sm-12"></div>
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
