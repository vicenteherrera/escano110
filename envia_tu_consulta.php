<?php
require_once('config.inc.php');

$table = new consultas();

//Establecimiento del men�
website::$current_page->menu = new menu_main();

//Carga del layout
website::load_layout('layout_portada.inc.php');

//Comprobaci�n de usuario
//require "check_user.inc.php";

//===========================================================================================


if ( ! website::$user->is_logged_in() ) {
    echo "Sesi�n no iniciada";
    return;
}

echo "<h1>Env�a tu consulta</h1>";

$table->__echo();

