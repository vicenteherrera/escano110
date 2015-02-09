<?php

require_once('config.inc.php');

//Establecimiento del menú
//website::$current_page->menu = new menu_main();

//Carga del layout
website::load_layout('layout.inc.php');

//Comprobación de usuario
//require "check_user.inc.php";
//===========================================================================================

  $propuesta = website::$database->execute_get_row_array(new sql_str("SELECT * FROM avotable WHERE id='{@0}'",$_GET['id']));
  if ( count($propuesta) == 0 ) {
    echo 'Parámetros por URL incorrectos.<br /><a href="./" class="leer_mas">VOLVER AL LISTADO</a>';
    return;
  }  
  if ( ! ( $propuesta['estado'] == 1 ) ) {
    echo 'No puede votar por esta propuesta, no está activa.<br /><a href="./" class="leer_mas">VOLVER AL LISTADO</a>';
    return;
  }
    
  $sql = new sql_str("SELECT fecha FROM votos WHERE id_propuesta='{@0}' AND id_usuario='{@1}'",$_GET['id'],website::$user->get_id());
  $votada = website::$database->execute_get_row_array($sql);
  
  if ( count ($votada) > 0 ) {
    echo 'No puede volver a votar por esta propuesta, ya lo hizo el '.$votada[fecha].'.<br /><a href="./" class="leer_mas">VOLVER AL LISTADO</a>';
    return;    
  }
  
  $sql = new sql_str("INSERT INTO `votos` (`id_usuario`, `id_propuesta`, `fecha`) VALUES ('{@0}','{@1}','{@2}')",
    website::$user->get_id(),$_GET['id'],Date('Y-m-d H:i:s'));
  $ok = website::$database->execute_nonquery($sql);
  
  if ( $ok ) {
    
    $sql = new sql_str("UPDATE avotable SET votos = votos + 1 WHERE id = '{@0}'", $_GET['id']);
    $ok = website::$database->execute_nonquery($sql);
  }
  
  if ( $ok ) {  
    header('location: '.website::$base_url.'/ver.php?id='.$_GET['id']);
  } else {
    echo 'Error al registrar el apoyo.<br /><a href="./" class="leer_mas">VOLVER AL LISTADO</a>';
    return;
  }
  
  
  
  