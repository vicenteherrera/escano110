<?php

require_once('config.inc.php');

$a = new avotable();
$a->pag_items_pag = 6;
$a->filter = true;
$a->filter_searchs = array('pregunta','respuesta','titulo', 'resumen');
$a->order_default_column = 'fecha_cerrada';
$a->order_default_order = 'ASC';
$a->init_config();
//$a->sql_where_forced = "`estado` = '1'";
$a->get('estado')->set_restricted_value(1);
//$a->sql_where_forced = "`estado` = '1' AND DATE(fecha_cerrada)>DATE(NOW())";
$a->commands['table']->item_prototype = new item_avotable_lista();
$a->commands['table']->pagination = new pagination_ui( $a );
$a->commands['table']->pagination->show_page_count = false;
$a->commands['table']->pagination->show_page_jump = false;

website::load_layout('layout.inc.php');

//===========================================================================================
?>
<div class="cabecera cab_iniciativas">
    <span>Iniciativas</span>
</div>
<?php
    echo '<div class="lista_iniciativas">';
    if ( $a->command_name == '' ) {
        $f = new filter_ui();
        echo $f->__toString();
    }
	$a->__echo();
    echo '</div>';
?>

<script>document.getElementById('menu_iniciativas').className ='selected';</script>