<?php
require_once('config.inc.php');

if ( command_select::get_count_selected_ids() == 0 ) {
    $a = new parlamentarios();
    $a->init_config();
    $a->commands['table']->item_prototype = new parlamentario_item();
    $a->commands['table']->item_prototype->set_show_link();
    $a->commands['table']->pagination = new pagination_ui( $a );
    $a->commands['table']->pagination->show_page_count = false;
    $a->commands['table']->pagination->show_page_jump = false;
} else {
    $a = new preguntas();
    $a->default_command = 'new';
    $a->save_message = 'Tu Pregunta ha sido enviada.<br /><br />En breve será revisada por nuestro equipo para su publicación.<br />Te avisaremos por email cuando se haga pública.';
    $a->save_continue_url = website::$base_url.'/participa.php';
    $a->init_config();
    $a->get('id_parlamentario')->set_default_value(command_select::get_selected_id());
    $a->get('tipo')->set_restricted_value(avotable::enum_tipo_pregunta);
    $a->get('estado')->set_restricted_value(0);
    $a->get('id_usuario')->set_restricted_value(website::$user->get_id());
}
//TODO: No permitir editar un elemento que no corresponde a su tipo

website::load_layout('layout.inc.php');

//===========================================================================================

echo '<h1>Nueva pregunta</h1>';
if ( ! website::$user->is_logged_in() ) {
    die('Debe iniciar sesión');   
}
if ( command_select::get_count_selected_ids() > 0 ) {
    $p = new parlamentario();
    $p->id = command_select::get_selected_id();
    $p->load_recursive();
    $pi = new parlamentario_item();
    $pi->set_data($p);
    echo $pi->__toString();
} else {
    echo "Elija un parlamentario al que realizar la pregunta.<br /><br />";
}
$a->__echo();
