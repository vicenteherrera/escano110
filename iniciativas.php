<?php

require_once('config.inc.php');

$a = new avotable();
$a->pag_items_pag = 6;

$a->order_default_column = 'fecha_cerrada';
$a->order_default_order = 'ASC';

$a->sql_where_forced = 
    "(
        `estado` <> '".avotable::enum_estado_enviada."' AND 
        `estado` <> '".avotable::enum_estado_rechazada."' AND
        ( 
            DATE_ADD(fecha_cerrada, INTERVAL 7 DAY) > DATE(NOW()) OR 
            fecha_cerrada='' OR fecha_cerrada='0000-00-00 00:00:00' 
        )
     )";
$a->init_config();
$a->filter_searchs = array('pregunta','respuesta','titulo', 'resumen');
$a->filter_fields = array('tipo','estado');
//$a->sql_where_forced = "`estado` = '1'";
//$a->get('estado')->set_restricted_value(1);
$a->commands['table']->item_prototype = new item_avotable_lista();
$a->commands['table']->pagination = new pagination_ui( $a );
$a->commands['table']->pagination->show_page_count = false;
$a->commands['table']->pagination->show_page_jump = false;
$a->commands['table']->no_data_msg = '<br /><br /><h2>No se encontraron iniciativas</h2><br /><br /><br />';
website::load_layout('layout.inc.php');

//===========================================================================================

echo '<div class="cabecera cab_iniciativas"><span>Iniciativas</span></div>';

echo '<div class="lista_iniciativas">';
    
if ( $a->get_command_name() == 'table' ) {
    $f = new filter_ui();
    echo $f->__toString();
}
$a->__echo();
    
echo $a->sql_where;
echo '</div>';
echo "<script>document.getElementById('menu_iniciativas').className ='selected';</script>";