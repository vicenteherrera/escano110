<?php
require_once('config.inc.php');
$a = new propuestas();
$a->default_command = 'new';
$a->save_message = 'Tu Propuesta ha sido enviada.<br /><br />En breve ser� revisada por nuestro equipo para su publicaci�n.<br />Te avisaremos por email cuando se haga p�blica.';
$a->save_continue_url = website::$base_url.'/participa.php';
$a->init_config();
$a->get('tipo')->set_restricted_value(avotable::enum_tipo_propuesta);
$a->get('estado')->set_restricted_value(0);
$a->get('id_usuario')->set_restricted_value(website::$user->get_id());

website::load_layout('layout.inc.php');

//===========================================================================================



//===========================================================================================

echo '<h1 style="width: 480px;margin: 20px auto;">Nueva propuesta</h1>';
if ( ! website::$user->is_logged_in() ) {
    die('Debe iniciar sesi�n');   
}

$a->__echo();
