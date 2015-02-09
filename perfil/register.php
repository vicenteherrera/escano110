<?php
require_once('config.inc.php');

$user = new users_register();

$user->default_command = 'new';

$user->init_config();
unset($user->commands['table']);
unset($user->commands['delete']);

website::load_layout('layout_portada.inc.php');

//===========================================================================================

if ( website::$user->is_logged_in() ) {
    header('location: index.php');
} else {
    echo "<h1>Regístrate</h1>";
    echo "Al registrarte, podras enviar consultas a nuestros expertos, o dar de alta tu empresa si lo deseas.<br /><br /><br />";
    $user->__echo();
}