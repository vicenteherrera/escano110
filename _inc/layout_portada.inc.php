<?php 
//---------------------------------------------------------------------------
website::$current_page->stylesheets_media['all'][] = website::$base_url."/_inc/menu.css";
website::$current_page->stylesheets_media['all'][] = website::$base_url."/styles.css";

//---------------------------------------------------------------------------
$web_footer 	 = website::$current_page->add_web_object( new web_footer() );
$web_header 	 = website::$current_page->add_web_object( new my_web_header() );
website::$current_page->add_web_object( new user_ui() );
website::$current_page->add_web_object( new link_button() );
website::$current_page->add_web_object( new table_data_webobject() );

//===========================================================================
if ( web_page::is_file_action() ) return;
ob_start();
website::$current_page->send_http_headers();
//---------------------------------------------------------------------------
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Escaño 110</title>
    <?php echo website::$current_page->print_html_header();?>
    <link media="all" href="<?php echo website::$base_url; ?>/_ext/wchar/wChar.css" type="text/css" rel="stylesheet">
    <meta name="description" content="Escaño 110 es una plataforma web para fomentará la participación ciudadana en la vida política andaluza, propiciando una mayor comunicación entre movimientos ciudadanos y gestores públicos." />    
    <link href="http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css" />
    <!-- CSS file -->
    <link rel="stylesheet" href="./slider/css/flexslider.css" rel="stylesheet" />
    <link rel="stylesheet" href="./_inc/cookies.css" rel="stylesheet" />
    <!-- Javascript file -->
    <!--
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
    -->
    <script src="<?php echo website::$base_url; ?>/_ext/wchar/assets/jquery.1.9.1.min.js" language="JavaScript" type="text/javascript"></script>


    <script type="text/javascript" src="./slider/js/jquery.flexslider-min.js"></script>
    <script type="text/javascript">
        //https://github.com/woothemes/FlexSlider/wiki/FlexSlider-Properties
        
        //$(window).load(
        $(document).ready(
            function(){$('.flexslider').flexslider({
                controlsContainer: '.flex-container',
                slideshow: false,
                animation: 'slide',
                pauseOnHover: true,
                controlNav: false,
                reverse: true,
                start: function(slider) {
                    $('.slide-anchor').click(function(event){
                      event.preventDefault();
                      slider.flexAnimate(parseInt(this.rel, 10), true);
                    });
                  }
            }); 
        });
    </script>

    <!-- SCRIPT CONTROL DE COOKIES -->
    <script type="text/javascript">
    function controlcookies() {
             // si variable no existe se crea (al clicar en Aceptar)
        localStorage.controlcookie = (localStorage.controlcookie || 0);
     
        localStorage.controlcookie++; // incrementamos cuenta de la cookie
        cookie1.style.display='none'; // Esconde la pol?ca de cookies
    }
    </script>
</head>
<body>
    <div class="cookiesms" id="cookie1">
        "Este sitio web utiliza cookies propias y de terceros para optimizar tu navegación adaptarse a tus preferencias y realizar labores analíticas. <br />
        Al continuar navegando aceptas nuestra <a href="./politica-cookies.php">Política de Cookies</a>. 
        <button onclick="controlcookies()">  Aceptar  </button>
    </div>
    <script type="text/javascript">
    if (localStorage.controlcookie>0){ 
    document.getElementById('cookie1').style.bottom = '-70px';
    }
    </script>
    <!-- Fin cookies --->
    
    <?php echo website::$current_page->getHtmlPostBodyIni();
    //background-image: url( echo website::$base_url;  /img/fase_alfa.png);
    ?> 
	<div id="full_page">
		<div id="header" style="background-repeat:no-repeat; background-position: 400px -18px;">
			<a href="<?php echo website::$base_url; ?>/"><img src="<?php echo website::$base_url; ?>/img/logo.png" alt="Escaño 110" id="logo" /></a>
			<img src="<?php echo website::$base_url; ?>/img/ocupa_tu_escano.jpg" alt="Escaño 110" id="ocupa" />
            <?php echo $web_header->__toString(); ?>
		</div>
		<div id="menu_superior">
            <a href="<?php echo website::$base_url; ?>/" id="menu_inicio">INICIO</a>
			<a href="<?php echo website::$base_url; ?>/que-es.php" id="menu_que_es">¿QUÉ ES?</a>
			<a href="<?php echo website::$base_url; ?>/participa.php" id="menu_participa">PARTICIPA</a>
			<a href="<?php echo website::$base_url; ?>/iniciativas.php" id="menu_iniciativas">INICIATIVAS</a>
			<a href="<?php echo website::$base_url; ?>/blog/" id="menu_blog">BLOG</a>
			<a href="<?php echo website::$base_url; ?>/colabora.php" id="menu_colabora">COLABORA</a>
            <a href="<?php echo website::$base_url; ?>/descargas.php" id="menu_descargas">DESCARGAS</a>
			<a href="<?php echo website::$base_url; ?>/quienes-somos.php" id="menu_quienes_somos">¿QUIÉNES SOMOS?</a>
            <!--<a href="<?php echo website::$base_url; ?>/faq.php" id="menu_quienes_somos">FAQ</a>-->
		</div>
        <?php require(dirname(__FILE__).'/../menu_admin.inc.php'); ?>
        <?php website::$current_page->include_main_content(); ?>
		<div id="pie1">
            <div id="pie_izq">
                <img src="img/entra.png" alt="Entra en el parlamento" /><br />
                <br />
                <br />
                <div class="pie_1_3">
                    <a href="http://agenciaconsentidocomun.com/"><img src="img/sentido_comun.png" alt="Sentido Común" /></a><br />
                    Promueve:<br />
                    <strong>Asociación Sentido Común</strong>
                </div>
                <div class="pie_1_3">
                    <a href="http://www.unia.es/"><img src="img/unia_goteo.png" alt="UNIA / Goteo" /></a><br />
                    Apoya:<br />
                    <strong>Universidad Internacional<br />de Andalucía<br />
                    Goteo</strong>
                </div>
                <div class="pie_1_3">                    
                    <img src="img/circulo.png" alt="Círculo Jurídico" /><br />
                    Asesoramiento legal:<br />
                    <strong>Círculo Jurídico</strong>
                    
                </div>
            </div>
            <div id="pie_dcha">
            <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/Escano110_" data-widget-id="494446655689613312">Tweets por el @Escano110_.</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
		</div>
		<div id="pie2">
			<a href="http://agenciaconsentidocomun.com">ASOCIACIÓN SENTIDO COMÚN</a>
			<a href="<?php echo website::$base_url; ?>/aviso-legal.php">AVISO LEGAL</a>
			<a href="<?php echo website::$base_url; ?>/politica-cookies.php">POLITICA COOKIES</a>
			<a href="<?php echo website::$base_url; ?>/quienes-somos.php">QUIÉNES SOMOS</a>
            <a href="<?php echo website::$base_url; ?>/faq.php">FAQ</a>
			<a href="<?php echo website::$base_url; ?>/contacto.php">CONTACTO</a>
			<a href="https://www.facebook.com/escano110"><img src="<?php echo website::$base_url; ?>/img/logo_facebook_dark.jpg" alt="" /></a>
			<a href="https://twitter.com/Escano110_"><img src="<?php echo website::$base_url; ?>/img/logo_twitter_dark.jpg" alt="" /></a>
		</div>
	</div>
    <br /><br /><br />
    <?php echo website::$current_page->getHtmlPrePageEnd(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-822637-26', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
<?php 
@ob_end_flush();
die;