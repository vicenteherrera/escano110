<?php

require_once('config.inc.php');

//Establecimiento del menú
//website::$current_page->menu = new menu_main();

//Carga del layout
website::load_layout('layout.inc.php');

//Comprobación de usuario
//require "check_user.inc.php";
//===========================================================================================
?>
<h1>Inicia sesión</h1>

<?php
website::$user->print_login_logut_page();

if ( ! website::$user->is_logged_in() ) {
    echo '<br /><br />¿No tienes cuenta de usuario? <a href="./participa.php">Regístrate para conseguir una</a>';
}