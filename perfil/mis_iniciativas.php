<?php
require_once('config.inc.php');

item_avotable_lista::$my_items = true;

$a = new avotable();
$a->pag_items_pag = 6;
$a->filter = true;
$a->filter_searchs = array('pregunta','respuesta','titulo', 'resumen');
$a->order_default_column = 'fecha_cerrada';
$a->order_default_order = 'ASC';
/*
$a->sql_where_forced = 
    "((`estado` = '".avotable::enum_estado_admitida."' OR ".
    " `estado` = '".avotable::enum_estado_exitosa."' ) AND ".
    "( DATE_ADD(fecha_cerrada, INTERVAL 7 DAY) > DATE(NOW()) OR fecha_cerrada='' OR fecha_cerrada='0000-00-00 00:00:00' ))";
*/
$a->init_config();
$a->get('id_usuario')->set_restricted_value(website::$user->get_id());
//$a->sql_where_forced = "`estado` = '1'";
//$a->get('estado')->set_restricted_value(1);
$a->commands['table']->item_prototype = new item_avotable_lista();
$a->commands['table']->pagination = new pagination_ui( $a );
$a->commands['table']->pagination->show_page_count = false;
$a->commands['table']->pagination->show_page_jump = false;

website::load_layout('layout.inc.php');

//===========================================================================================
?>
<h1>Mis iniciativas</h1>
<?php

if ( ! website::$user->is_logged_in() ) {
    die('Debe iniciar sesión');   
}


    echo '<div class="lista_iniciativas">';
    if ( $a->command_name == '' ) {
        $f = new filter_ui();
        echo $f->__toString();
    }
	$a->__echo();
    echo '</div>';
?>

<script>document.getElementById('menu_iniciativas').className ='selected';</script>