<?php
require_once('config.inc.php');

$table = new consultas();

//Establecimiento del menú
website::$current_page->menu = new menu_main();

//Carga del layout
website::load_layout('layout_portada.inc.php');

//Comprobación de usuario
//require "check_user.inc.php";

//===========================================================================================


if ( ! website::$user->is_logged_in() ) {
    echo "Sesión no iniciada";
    return;
}

echo "<h1>Envía tu consulta</h1>";

$table->__echo();

