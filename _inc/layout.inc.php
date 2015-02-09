<?php 
if ( web_page::is_file_action() ) { return; }
//---------------------------------------------------------------------------
website::$current_page->stylesheets_media['all'][] = website::$base_url."/_inc/menu.css";
website::$current_page->stylesheets_media['all'][] = website::$base_url."/styles.css";

//---------------------------------------------------------------------------
$web_footer 	 = website::$current_page->add_web_object( new web_footer() );
$web_header 	 = website::$current_page->add_web_object( new my_web_header() );
website::$current_page->add_web_object( new user_ui() );
website::$current_page->add_web_object( new link_button() );
website::$current_page->add_web_object( new table_data_webobject() );
website::$current_page->add_web_object( new web_calendar() );
//===========================================================================
if ( web_page::is_file_action() ) return;
ob_start();
website::$current_page->send_http_headers();
//---------------------------------------------------------------------------
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
    <!-- To force not-metro IE -->
    <meta http-equiv="X-UA-Compatible"content="requiresActiveX=true" />
	<title>Escaño 110</title>
    <?php echo website::$current_page->print_html_header();?>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
    <meta name="description" content="Escaño 110 es una plataforma web para fomentará la participación ciudadana en la vida política andaluza, propiciando una mayor comunicación entre movimientos ciudadanos y gestores públicos." />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>    
</head>
<body>
    <?php echo website::$current_page->getHtmlPostBodyIni();
    //background-image: url(echo website::$base_url; /img/fase_alfa.png);
    ?> 
	<div id="full_page">
		<div id="header" style=" background-repeat:no-repeat; background-position: 400px -18px;">
            <a href="<?php echo website::$base_url; ?>/"><img src="<?php echo website::$base_url; ?>/img/logo.png" alt="Escaño 110" id="logo" /></a>
			<img src="<?php echo website::$base_url; ?>/img/ocupa_tu_escano.jpg" alt="Escaño 110"  id="ocupa" />
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
		</div>
        <?php require(dirname(__FILE__).'/../menu_admin.inc.php'); ?>
        <div id="main">
            <?php website::$current_page->include_main_content(); ?>
		</div>
        
		<div id="pie2">
			<a href="http://agenciaconsentidocomun.com/">ASOCIACIÓN SENTIDO COMÚN</a>
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