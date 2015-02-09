<?php
require_once('config.inc.php');

$a = new comisiones_miembros();
$a->init_config();

website::load_layout('layout.inc.php');

//===========================================================================================
require "check_user.inc.php";
//===========================================================================================
echo '<h1>Comisiones Parlamentarias</h1>';

if ( ! command_select::is_set_selected_id() ) {
    echo 'URL incorrecta';
    return;
}

$a->get('id_comision')->set_restricted_value(command_select::get_selected_id());
$a->__echo();
