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

$c = new comision(command_select::get_selected_id());
$c->load();

echo '<h2>'.$c->nombre.'</h2>';



$a->get('id_comision')->set_restricted_value(command_select::get_selected_id());
$a->__echo();

if ($a->command_name == '' || $a->command_name == 'table') {
    echo "<a href=\"".website::$base_url."/comisiones.php\" class=\"leer_mas\">Volver al listado de comisiones</a>";
}
