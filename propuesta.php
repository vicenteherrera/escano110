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
  if ( ! ( $propuesta['estado'] == 2 ||  $propuesta['estado'] == 3 ) && ! website::$user->is_in_any_group(array('administrador') ) ) {
    echo 'No tiene permiso para visualizar esta propuesta.<br /><a href="./" class="leer_mas">VOLVER AL LISTADO</a>';
    return;
  }
    
  $sql = new sql_str("SELECT fecha FROM votos WHERE id_propuesta='{@0}' AND id_usuario='{@1}'",$_GET['id'],website::$user->get_id());
  $votada = website::$database->execute_get_row_array($sql);
  //echo $sql;
  
  ?>
    
    		<h1><?php echo $propuesta['titulo']; ?></h2>
            <div style="width: 260px; display: inline-block;">
                <?php 
                    if ( $propuesta['imagen'] ) {
                ?>
                    <img src="<?php echo website::$base_url.'/get_img2.php?file='.rawurlencode($propuesta['imagen']).'&view_mode=thumb'; ?>" alt="" 
                        style="width:250px; " /><br />
                <?php } else { ?>        
        		    <img src="img/propuesta_ejemplo.jpg" alt="" /><br />
                <?php } ?>
                <br style="clear: both;" />
    		    <a href="./" class="leer_mas">VOLVER AL LISTADO</a>
            </div>
            <div style="width: 600px; display: inline-block;">
    		    <?php echo nl2br($propuesta['descripcion']); ?><br />
                <br />
                Fecha inicio: <b><?php echo $propuesta['fecha_admitida']; ?></b> &nbsp;&nbsp;&nbsp;
                Fecha fin: <b><?php echo $propuesta['fecha_cerrada']; ?></b><br />
                
                <br />
            
            <?php
            
                //'estado' => array( 0=>'Enviada',1=>'Aceptada',2=>'Activa',3=>'Cerrada', 4=>Rechazada ),
                
                if ( $propuesta['estado'] == 0 ) { //Enviada
                
                    echo 'Esta propuesta aún no ha sido revisada para su publicación.<br />';
                    
                } else if ( $propuesta['estado'] == 1 ) { //Aceptada
                
                    echo 'Esta propuesta aún no se ha activado. <br />';
                    
                } else if ( $propuesta['estado'] == 2 ) { //Activa
                
                    echo "<span class=\"numero_votos\">$propuesta[votos] apoyos</span>";
                    
                    if ( is_array($votada) && count($votada)>0 ) {
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;Apoyaste esta propuesta el ".$votada['fecha']."<br />";
                    } else {
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"".website::$base_url."/votar.php?id=".$_GET['id']."\" class=\"leer_mas\">Apoyar esta propuesta</a>";
                    }
                    
                } else if ( $propuesta['estado'] == 3 ) { //Cerrada
                
                    echo 'Esta propuesta está cerrada<br />';
                    echo "<span class=\"numero_votos\">$propuesta[votos] apoyos</span><br />";
                    
                } else if ( $propuesta['estado'] == 4 ) { //Rechazada
                
                    echo 'Esta propuesta no ha sido aceptada para su publicación.<br />';
                    
                }
            ?>
            </div>
    
    