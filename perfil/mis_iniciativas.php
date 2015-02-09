<?php

require_once('config.inc.php');

$a = new avotable();
$a->pag_items_pag = 6;
$a->filter = true;
$a->filter_searchs = array('pregunta','respuesta','titulo', 'resumen');
$a->init_config();
//$a->get('estado')->set_restricted_value(1);
$a->commands['table']->item_prototype = new item_avotable_lista();
$a->commands['table']->pagination = new pagination_ui( $a );
$a->commands['table']->pagination->show_page_count = false;
$a->commands['table']->pagination->show_page_jump = false;
$a->get('id_usuario')->set_restricted_value(website::$user->get_id());
website::load_layout('layout.inc.php');

//===========================================================================================
?>
<h1>Mis iniciativas</h1>

<?php



if ( ! website::$user->is_logged_in() ) {
    die('Debe iniciar sesión');   
}

    if ( $a->command_name == '' ) {
        $f = new filter_ui();
        echo $f->__toString();
    }
	$a->__echo();
