<?php
require_once('config.inc.php');
$a = new ilps();
$a->default_command = 'new';
$a->init_config();
$a->get('tipo')->set_restricted_value(avotable::enum_tipo_ilp);
$a->get('estado')->set_restricted_value(0);
$a->get('id_usuario')->set_restricted_value(website::$user->get_id());

website::load_layout('layout.inc.php');

//===========================================================================================


//===========================================================================================

echo '<h1>Nueva Iniciativa Legislativa Popular</h1>';
if ( ! website::$user->is_logged_in() ) {
    die('Debe iniciar sesión');   
}

$a->__echo();
