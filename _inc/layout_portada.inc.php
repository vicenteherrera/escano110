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
    <meta name="description" content="Escaño 110 es una plataforma web para fomentará la participación ciudadana en la vida política andaluza, propiciando una mayor comunicación entre movimientos ciudadanos y gestores públicos." />    
    <link href="http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css" />
    
    <!-- CSS file -->
    <link rel="stylesheet" href="./slider/css/flexslider.css" rel="stylesheet" />

    <!-- Javascript file -->
    <script type="text/javascript" src="./slider/js/jquery.1.6.2.min.js"></script>
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

</head>
<body>
    <?php echo website::$current_page->getHtmlPostBodyIni();
    //background-image: url( echo website::$base_url;  /img/fase_alfa.png);
    ?> 
	<div id="full_page">
		<div id="header" style="background-repeat:no-repeat; background-position: 400px -18px;">
			<a href="<?php echo website::$base_url; ?>/"><img src="<?php echo website::$base_url; ?>/img/logo.png" alt="Escaño 110" id="logo" /></a>
			<img src="<?php echo website::$base_url; ?>/img/ocupa_tu_escano.jpg" alt="Escaño 110" id="ocupa" />
            
            <?php echo $web_header->__toString(); ?>
            
            <a href="https://twitter.com/sentidocomunweb" target="_blank" class="network_icon"><img src="<?php echo website::$base_url; ?>/img/facebook_icon.png" alt="Twitter" /></a>
            <a href="http://facebook.com/agenciaconsentidocomun" target="_blank" class="network_icon"><img src="<?php echo website::$base_url; ?>/img/twitter_icon.png" alt="Facebook" /></a>
            <a href="<?php echo website::$base_url; ?>/quienes-somos.php#cofinanciadores" class="network_icon"><img src="<?php echo website::$base_url; ?>/img/users_icon.png" alt="Quienes somos" /></a>           
            
		</div>
		<div id="menu_superior">
            <a href="<?php echo website::$base_url; ?>/" id="menu_inicio">INICIO</a>
			<a href="<?php echo website::$base_url; ?>/que-es.php" id="menu_que_es">¿QUÉ ES?</a>
			<a href="<?php echo website::$base_url; ?>/participa.php" id="menu_participa">PARTICIPA</a>
			<a href="<?php echo website::$base_url; ?>/iniciativas.php" id="menu_iniciativas">INICIATIVAS</a>
			<a href="<?php echo website::$base_url; ?>/blog/" id="menu_blog">BLOG</a>
			<a href="<?php echo website::$base_url; ?>/colabora.php" id="menu_colabora">COLABORA</a>
			<a href="<?php echo website::$base_url; ?>/quienes-somos.php" id="menu_quienes_somos">¿QUIÉNES SOMOS?</a>
                        <a href="<?php echo website::$base_url; ?>/descargas.php" id="menu_quienes_somos">DESCARGAS</a>
            <a href="<?php echo website::$base_url; ?>/faq.php" id="menu_quienes_somos">FAQ</a>
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
                    <a href="http://www.circulojuridico.eu/"><img src="img/circulo.png" alt="Círculo Jurídico" /></a><br />
                    Asesoramiento legal:<br />
                    <strong>Círculo Jurídico</strong>
                    
                </div>
            </div>
            <div id="pie_dcha">
                <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/sentidocomunweb" data-widget-id="494446655689613312">Tweets por @sentidocomunweb</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
		</div>
		<div id="pie2">
			<a href="http://agenciaconsentidocomun.com">ASOCIACIÓN SENTIDO COMÚN</a>
			<a href="<?php echo website::$base_url; ?>/aviso-legal.php">AVISO LEGAL</a>
			<a href="<?php echo website::$base_url; ?>/politica-cookies.php">POLITICA COOKIES</a>
			<a href="<?php echo website::$base_url; ?>/quienes-somos.php">QUIÉNES SOMOS</a>
			<a href="<?php echo website::$base_url; ?>/contacto.php">CONTACTO</a>
			<a href="http://facebook.com/agenciaconsentidocomun"><img src="<?php echo website::$base_url; ?>/img/logo_facebook_dark.jpg" alt="" /></a>
			<a href="https://twitter.com/sentidocomunweb"><img src="<?php echo website::$base_url; ?>/img/logo_twitter_dark.jpg" alt="" /></a>
		</div>
	</div>
    <?php echo website::$current_page->getHtmlPrePageEnd(); ?>
</body>
</html>
<?php 
@ob_end_flush();
die;