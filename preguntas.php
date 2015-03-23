<?php
require_once('config.inc.php');

$a = new preguntas();
$a->init_config();
$a->get('tipo')->set_restricted_value(avotable::enum_tipo_pregunta);
//TODO: No permitir editar un elemento que no corresponde a su tipo
$a->get('url_articulo')->set_visible();
website::load_layout('layout.inc.php');

//===========================================================================================

require "check_user.inc.php";

//===========================================================================================

echo '<h1>Preguntas a parlamentarios</h1>';

$a->__echo();