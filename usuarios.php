<?php
require_once('config.inc.php');

$a = new users();
$a->init_config();

website::load_layout('layout.inc.php');

//===========================================================================================

require "check_user.inc.php";

//===========================================================================================




echo '<h1>Gestión de Usuarios</h1>';
$a->filter_fields = $a->columns_table_view;
$a->filter=true;
$a->__echo();


