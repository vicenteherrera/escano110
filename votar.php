<?php

require_once ('config.inc.php');

//Carga del layout
website::load_layout('layout.inc.php');

//===========================================================================================

if (!website::$user->is_logged_in()) {
    echo 'Debe iniciar sesi�n para poder votar un elemento.<br /><a href="./" class="leer_mas">VOLVER AL LISTADO</a>';
}
$propuesta = website::$database->execute_get_row_array(new sql_str("SELECT * FROM avotable WHERE id='{@0}'",
    $_GET['id']));
if ( count($propuesta) == 0) {
    echo 'Par�metros por URL incorrectos.<br /><a href="./" class="leer_mas">VOLVER AL LISTADO</a>';
    return;
}
if ( ! ($propuesta['estado'] == 1) ) {
    echo 'No puede votar por esta propuesta, no est� activa.<br /><a href="./" class="leer_mas">VOLVER AL LISTADO</a>';
    return;
}

$sql = new sql_str("SELECT fecha FROM votos WHERE id_propuesta='{@0}' AND id_usuario='{@1}'",
    $_GET['id'], website::$user->get_id());
$votada = website::$database->execute_get_row_array($sql);

if ( count($votada) > 0) {
    echo 'No puede volver a votar por esta propuesta, ya lo hizo el ' . $votada['fecha'] .
        '.<br /><a href="./" class="leer_mas">VOLVER AL LISTADO</a>';
    return;
}

$sql = new sql_str("INSERT INTO `votos` (`id_usuario`, `id_propuesta`, `fecha`) VALUES ('{@0}','{@1}','{@2}')",
    website::$user->get_id(), $_GET['id'], Date('Y-m-d H:i:s'));
$ok = website::$database->execute_nonquery($sql);
//echo $sql."<br /><br /><pre>";
//var_dump(website::$user);

if ( $ok ) {
    //$sql = new sql_str("UPDATE avotable SET votos = votos + 1 WHERE id = '{@0}'", $_GET['id']);
    $sql = new sql_str("UPDATE avotable SET votos = (SELECT COUNT(1) AS num FROM votos WHERE id_propuesta='{@0}') WHERE id = '{@0}'", $_GET['id']);
    
    $ok = website::$database->execute_nonquery($sql);
    //echo $sql . "<br /><br />";
}

if ( $ok ) {
    header('location: '.website::$base_url.'/ver.php?id='.$_GET['id']);
} else {
    echo 'Error al registrar el apoyo.<br /><a href="./" class="leer_mas">VOLVER AL LISTADO</a>';
    return;
}
