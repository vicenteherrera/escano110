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
website::$current_page->add_web_object( new overlib() );
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
	<title>Esca�o 110</title>
    <meta name="description" content="Esca�o 110 es una plataforma web para fomentar� la participaci�n ciudadana en la vida pol�tica andaluza, propiciando una mayor comunicaci�n entre movimientos ciudadanos y gestores p�blicos." />
    <?php echo website::$current_page->print_html_header();?>
    <link media="all" href="<?php echo website::$base_url; ?>/_ext/wchar/wChar.css" type="text/css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'> 
    <!--
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
    -->
    <script src="<?php echo website::$base_url; ?>/_ext/wchar/assets/jquery.1.9.1.min.js" language="JavaScript" type="text/javascript"></script>
	<script src="<?php echo website::$base_url; ?>/_ext/wchar/wChar.min.js" language="JavaScript" type="text/javascript"></script>
      
 </head>
 <body>
    <?php echo website::$current_page->getHtmlPostBodyIni();
    //background-image: url(echo website::$base_url; /img/fase_alfa.png);
    ?> 
	<div id="full_page">
		<div id="header" style=" background-repeat:no-repeat; background-position: 400px -18px;">
            <a href="<?php echo website::$base_url; ?>/"><img src="<?php echo website::$base_url; ?>/img/logo.png" alt="Esca�o 110" id="logo" /></a>
			<img src="<?php echo website::$base_url; ?>/img/ocupa_tu_escano.jpg" alt="Esca�o 110"  id="ocupa" />
            <?php echo $web_header->__toString(); ?>
        
		</div>
		<div id="menu_superior">
            <a href="<?php echo website::$base_url; ?>/" id="menu_inicio">INICIO</a>
			<a href="<?php echo website::$base_url; ?>/que-es.php" id="menu_que_es">�QU� ES?</a>
			<a href="<?php echo website::$base_url; ?>/participa.php" id="menu_participa">PARTICIPA</a>
			<a href="<?php echo website::$base_url; ?>/iniciativas.php" id="menu_iniciativas">INICIATIVAS</a>
			<a href="<?php echo website::$base_url; ?>/blog/" id="menu_blog">BLOG</a>
			<a href="<?php echo website::$base_url; ?>/colabora.php" id="menu_colabora">COLABORA</a>
            <a href="<?php echo website::$base_url; ?>/descargas.php" id="menu_descargas">DESCARGAS</a>
            <a href="<?php echo website::$base_url; ?>/quienes-somos.php" id="menu_quienes_somos">�QUI�NES SOMOS?</a>
            <!--<a href="<?php echo website::$base_url; ?>/faq.php" id="menu_quienes_somos">FAQ</a>-->
		</div>
        <?php require(dirname(__FILE__).'/../menu_admin.inc.php'); ?>
        <div id="main">
            <?php website::$current_page->include_main_content(); ?>
		</div>
        
		<div id="pie2">
			<a href="http://agenciaconsentidocomun.com/">ASOCIACI�N SENTIDO COM�N</a>
			<a href="<?php echo website::$base_url; ?>/aviso-legal.php">AVISO LEGAL</a>
			<a href="<?php echo website::$base_url; ?>/politica-cookies.php">POLITICA COOKIES</a>
			<a href="<?php echo website::$base_url; ?>/quienes-somos.php">QUI�NES SOMOS</a>
            <a href="<?php echo website::$base_url; ?>/faq.php">FAQ</a>
			<a href="<?php echo website::$base_url; ?>/contacto.php">CONTACTO</a>
			<a href="https://www.facebook.com/escano110"><img src="<?php echo website::$base_url; ?>/img/logo_facebook_dark.jpg" alt="" /></a>
			<a href="https://twitter.com/Escano110_"><img src="<?php echo website::$base_url; ?>/img/logo_twitter_dark.jpg" alt="" /></a>
		</div>
        
	</div>
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