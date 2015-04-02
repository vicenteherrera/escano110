<?php
require_once('config.inc.php');

$id_promotor = 0; $error = false;
if (isset($_GET['id'])) $id_promotor = $_GET['id'];
else $error = true;

$visible = website::$database->execute_get_simple_value(new sql_str(
    "SELECT 1 from avotable where id_usuario='{@0}' and ( estado=1 or estado=2 or estado=3 ) limit 1",
    $id_promotor
));




website::load_layout('layout.inc.php');

//===========================================================================================


//===========================================================================================

if ( ! $visible ) {
    echo 'Error en dirección URL.<br /><br />';
    echo '<a href="iniciativas.php" class="leer_mas">Volver al listado de inciativas</a>';
    return;
} 
echo "<div style=\"padding-left: 30px;\"><h1>Promotor/a</h1>";

$usuario = new usuario($id_promotor);
$usuario->load();

echo "<div style=\"margin:0px 20px 9px 0; padding: 15px 15px;  vertical-align: top; line-height: 20px;\">";

$avatar = $usuario->avatar;
if ($avatar!='') {
    //$img = new image(website::$base_dir.'/uploads/fw_users/'.$avatar);
    //$img->send_thumbnail();
    echo '<a href="#" style="position:relative; padding:2px 2px; width:150px; border: 1px solid #fff; height:150px;display: block;">';
    echo '<img src="'.website::$base_url.'/get_img_user.php?view_mode=thumb&file='.urlencode($avatar).'" alt="" />';
    echo '</a>';
} else {
    echo '<a href="#" style="position:relative; padding:2px 2px; width:150px; border: 1px solid #fff; height:150px; display: block;">';
    echo '<img src="'.website::$base_url.'/img/noavatar.png" alt="" />';
    echo '</a>';
}


echo "<br />";
echo "<b>Nombre:</b> ".$usuario->name."<br />";
if ($usuario->surname) echo "<b>Apellidos:</b> ".$usuario->surname."<br />";
if ($usuario->description) echo "<b>Descripción:</b> ".$usuario->description."<br />";
if ($usuario->web) echo "<b>Web:</b> ".$usuario->web."<br />";
echo "</div>";


echo "<div style=\" margin:0px 20px 9px 0; padding: 0px 15px;\">";

echo $usuario->get_statistics_text();
echo "</div>";
echo "<br />";


