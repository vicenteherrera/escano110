<?php

require_once('config.inc.php');

$a = new avotable();
$a->pag_items_pag = 6;
$a->sql_where_forced = 
    "(`estado` = '".avotable::enum_estado_admitida."' OR ".
    " `estado` = '".avotable::enum_estado_exitosa."' ) AND ".
    "( DATE_ADD(fecha_cerrada, INTERVAL 7 DAY) > DATE(NOW()) OR fecha_cerrada='' OR fecha_cerrada='0000-00-00 00:00:00' )";
$a->order_default_column = 'fecha_admitida';
$a->order_default_order = 'DESC';
$a->init_config();
//$a->get('estado')->set_restricted_value('1');
$a->commands['table']->item_prototype = new item_avotable_miniatura();
$a->commands['table']->pagination = new pagination_more( $a );
$a->commands['table']->pagination->target_url = 'iniciativas.php';
$a->commands['table']->pagination->target_class = 'leer_mas';
$a->commands['table']->pagination->target_text = 'Ver listado completo de iniciativas';

//Establecimiento del menú
//website::$current_page->menu = new menu_main();

//Carga del layout
website::load_layout('layout_portada.inc.php');

//Comprobación de usuario
//require "check_user.inc.php";
//===========================================================================================
?>
<div id="central" style="position: relative;">
    <!--<img src="img/banderola_alfa_min.png" alt="Fase alfa" style="position:  absolute; left: -19px; top: 0px; z-index: 999;" />-->
	<a href="./participa.php"><img src="img/presenta_tu_ilp.jpg" alt="" style="width:233px; height:201px;" /></a>
	<a href="./participa.php"><img src="img/pregunta.jpg" alt="" style="width:230px; height:201px;" /></a>
	<a href="./participa.php"><img src="img/haz_tu_propuesta.jpg" alt="" style="width:225px; height:201px;" /></a>
</div>
<?php require(dirname(__FILE__).'/slider.inc.php'); ?>

<div id="propuestas">


<?php
    //if ( website::$user->is_logged_in() ) {
        $a->__echo();
        
     /*   //echo '<br /><br />'.$a->sql." ".$a->sql_where;
    } else {
        ?>
            <div style="background-image: url(img/mock_portada.png); width:960px; height: 455px; position:relative">
                <div style="width:960px; padding: 40px 0; background-color: rgba(0,0,0,0.6); color: white; font-size: 30px; position: absolute; top: 200px;">
                    <strong>Nuestra web se encuentra en elaboración,<br />
                    por favor, vuelva a consultarla más adelante</strong>
                </div>
            </div>
        <?php
    }*/
	
?>    
</div>

<script>document.getElementById('menu_inicio').className ='selected';</script>


