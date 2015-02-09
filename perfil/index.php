<?php
require_once('config.inc.php');

$user = new users_register();

$user->default_command = 'new';

$user->init_config();
unset($user->commands['table']);
unset($user->commands['delete']);


website::load_layout('layout.inc.php');

//===========================================================================================

if ( website::$user->is_logged_in() ) {
    require 'profile.inc.php';   
} else {    
    
    echo '<h1>Inicia sesión</h1>';
    website::$user->print_login_logut_page();
    echo '<br /><br />¿No tienes cuenta de usuario? <a href="../participa.php">Regístrate para conseguir una</a>';


}