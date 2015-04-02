<?php
require_once('config.inc.php');

$e = new users_register();
$e->add_command(new command_set());
$e->add_command(new command_insert());
$e->add_command(new command_update());
$e->add_command(new command_insert_or_update());
$e->add_command(new command_remove_file());
$e->init_config();   
$e->get('type')->set_readonly();

$e->control_group = new control_edit($e);

$e->control_group->add(
    'id',
    'type',
    'username',
    'name',
    'surname',
    'date_of_birth',
    'description', 
    'web',
    'avatar',
    new control_fieldset($e,'','Cambio de contraseña','',
        array(
    'password',
    'password2'),''),
    'group'
);  
      
$e->send_button_mesage = 'Guardar cambios';
$e->save_message = 'Datos guardados';
$e->save_continue_url = website::$base_url.'/perfil/';
$e->get('id')->set_restricted_value(website::$user->get_id());
$e->default_command = 'set';


website::load_layout('layout.inc.php');

//===========================================================================================

echo "<h1>Editar datos de mi perfil</h1>";




$e->__echo();
return;
    


