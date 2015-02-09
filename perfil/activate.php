<?php
require_once('config.inc.php');
website::load_layout('layout.inc.php');
//===========================================================================================
echo "<h1>Confirmaci�n de email de usuario</h1>";
if ( ! isset($_GET['k'] ) || $_GET['k'] == ''  ) {
    echo '<a href="'.website::$base_url.'/" class="link_button"><<< Volver a Inicio</a><br /><br />';
    die;
}

if ( $_GET['k'] == 'ok' ) {
    echo "Su cuenta ha sido activada correctamente, ya puede iniciar sesi�n.<br /><br />";
    echo '<a href="../inicia-sesion.php" class="link_button">Ir a inicio de sesi�n</a><br /><br />';   
    return;    
} else {
    $sql = "SELECT activation,verified from fw_users where activation='{@0}' limit 2";
    $result = website::$database->execute_get_array(new sql_str($sql,$_GET['k']));
    
    if ( count($result) <> 1 || $result[0]['verified'] ) {
        echo "No se encontr� la activaci�n. Es posible que el enlace ya haya sido utilizado para activar su cuenta, o que no lo haya escrito correctamente.<br />Si ya utiliz� el enlace anteriormente, pruebe directamente a <a href=\"index.php\">Iniciar sesi�n con sus datos</a><br />";
        echo '<a href="'.website::$base_url.'/" class="link_button"><<< Volver a Inicio</a><br /><br />';
        die;
    }
    
    //Activation found and not verified.
    
    //We set verification to true
    
    $sql = "UPDATE fw_users SET activation='', verified=1  WHERE activation='{@0}'";
    $s = new sql_str($sql,$_GET['k']);
    $ok = website::$database->execute_nonquery($s);
    
    if ( $ok ) {
        html_template::redirect('./activate.php?k=ok','Activaci�n correcta');
    } else {
        echo "Error al procesar la activaci�n.<br /><br />";
        echo '<a href="'.website::$base_url.'/" class="link_button"><<< Volver a Inicio</a><br /><br />';
        die;
    }
}