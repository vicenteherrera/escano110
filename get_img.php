<?php

require_once(dirname(__FILE__)."/config.inc.php");

//Comprobamos que se trata de un usuario con permiso
/*
if ( ! website::$user->is_in_any_group(array('tecnico','supertecnico','administrador','gestor'))) {
	die('acceso no autorizado, inicie sesión');
}
*/
//-------------------------------------------------------

$img = new image();
$img->dir  = website::$base_dir.'/__upload/avotable/';

$img->thumb_max_height =  100;
$img->thumb_max_width  =  100;
$img->thumb_cache_dir_sufix = 'thumb_cache';
$img->filename = url::read('file');
$img->send_image_or_thumb();
