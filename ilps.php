<?php
require_once('config.inc.php');

$a = new ilps();
$a->filter_searchs = array('titulo', 'resumen');
$a->init_config();
$a->get('url_articulo')->set_visible();
website::load_layout('layout.inc.php');

//===========================================================================================

require "check_user.inc.php";

//===========================================================================================

echo '<h1>Iniciativas Legislativas Populares</h1>';

$a->__echo();


