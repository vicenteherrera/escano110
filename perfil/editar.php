<?php
require_once('config.inc.php');
website::$current_page->add_js_file("https://maps.googleapis.com/maps/api/js");
website::load_layout('layout.inc.php');

//===========================================================================================

echo "<h1>Editar datos de mi perfil</h1>";



$e = new users_register();

$e->add_command(new command_set());
$e->add_command(new command_insert());
$e->add_command(new command_update());
$e->add_command(new command_insert_or_update());
$e->init_config();    
$e->get('id')->set_restricted_value(website::$user->get_id());
$e->default_command = 'set';
$e->__echo();
return;
    


