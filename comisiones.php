<?php
require_once('config.inc.php');

$a = new comisiones();
$a->init_config();

website::load_layout('layout.inc.php');

//===========================================================================================
require "check_user.inc.php";
//===========================================================================================
echo '<h1>Comisiones Parlamentarias</h1>';

$a->__echo();


