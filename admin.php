<?php
require_once('config.inc.php');

website::load_layout('layout.inc.php');
//===========================================================================================

require "check_user.inc.php";

//===========================================================================================

require 'menu_horizontal.inc.php';
require 'menu_horizontal_admin.inc.php';

echo '<h1>Administrar herramienta de cuestionarios</h1><br />';

if ( ! website::$user->is_in_any_group(array('administrador','tecnico','tecnico-manual') ) ) {
    echo "Debe ser administrador o técnico para acceder a esta sección";
    return;
}

//if ($a->command_name == '')
//    echo "<a href=\"?command_=new\" style=\"font-size:1.2em;\" class=\"link_button\" id=\"extra_new_link\">Nueva empresa</a><br /><br />";
    
//var_dump($a->columns_title);


