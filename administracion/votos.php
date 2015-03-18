<?php
require_once('config.inc.php');

$a = new votos();
$a->init_config();

website::load_layout('layout.inc.php');

//===========================================================================================

require "../check_user.inc.php";

//===========================================================================================

if ( ! command_select::is_set_selected_id() ) {
    echo 'URL incorrecta';
    return;
}

$avotable_data = new avotable_data(command_select::get_selected_id());
$avotable_data->load();

echo '<h1>Apoyos '.$avotable_data->get_nombre_tipo().' '.$avotable_data->id.': ';
echo $avotable_data->titulo.'</h1>';

$a->get('id_propuesta')
    ->set_restricted_value(command_select::get_selected_id())
    ->set_visible(false);
$a->__echo();


if ($a->command_name == '' || $a->command_name == 'table') {
    //echo "<a href=\"".website::$base_url."/comisiones.php\" class=\"leer_mas\">Volver al listado de comisiones</a>";
}
