<?php
//TODO: Prevent not including

if ( ! website::$user->is_logged_in() ) {
    die('Sesión no iniciada');
}

echo "<div style=\"padding-left: 30px;\"><h1>Perfil de usuario</h1>";

echo "<div style=\"width: 450px; margin:20px 20px 9px 0; padding: 15px 15px; background-color: #eee; float: left;line-height: 20px;\">";

$avatar = website::$user->get('avatar');
if ($avatar!='') {
    //$img = new image(website::$base_dir.'/uploads/fw_users/'.$avatar);
    //$img->send_thumbnail();
    echo '<img src="'.website::$base_url.'/get_img_user.php?view_mode=thumb&file='.urlencode($avatar).'" alt="" /><br />';
} else {
    echo '<a href="'.website::$base_url.'/perfil/editar.php" style="position:relative;">';
    echo '<img src="'.website::$base_url.'/img/noavatar.png" alt="" />';
    echo '<span style="position:absolute; bottom:0; left:0; display: block; background-color:#eee; opacity:0.7;
        width:150px;text-align:center; padding: 3px 0;">Establecer imagen</span>';
    echo '</a><br />';
}


echo "<b>Email / Usuario:</b> ".website::$user->get('username')."<br />";
echo "<b>Nombre:</b> ".website::$user->get('name')."<br />";
if (website::$user->get('surname')) echo "<b>Apellidos:</b> ".website::$user->get('surname')."<br />";
if (website::$user->get('description')) echo "<b>Descripción:</b> ".website::$user->get('description')."<br />";
echo "</div>";
echo '<a href="'.website::$base_url.'/perfil/editar.php" class="link_button2">Editar mis datos</a>';
echo '<a href="'.website::$base_url.'/fw-login.php?command_=logout" class="link_button2">Cerrar sesión</a><br /><br />';



echo '<br /><br />';
    if ( website::$user->is_logged_in() ) {
        echo '<a href="./nueva_ilp.php" class="link_button2" style="position: relative; height: 15px; width: 110px; margin: 10px 0 0 0px;"><img 
        src="../img/tipos/ilp.png" alt="" style="position: absolute; top:-13px; left: -43px;">Presenta tu ILP</a>';
    }
    ?>
    <br /><br /><br />
        <?php
    if ( website::$user->is_logged_in() ) {
        echo '<a href="./nueva_pregunta.php" class="link_button2" style="position: relative; height: 15px; width: 121px; margin: 10px 0 0 0px;"><img 
        src="../img/tipos/pregunta.png" alt="" style="position: absolute; top:-13px; left: -43px;">Lanza tu pregunta</a>';
    }
    ?>
    <br /><br /><br />
    <?php
    if ( website::$user->is_logged_in() ) {
        echo '<a href="./nueva_propuesta.php" class="link_button2" style="position: relative; height: 15px; width: 121px; margin: 10px 0 0 0px;"><img 
        src="../img/tipos/propuesta.png" alt="" style="position: absolute; top:-13px; left: -43px;">Haz tu propuesta</a>';
    }
    ?>
 <br /><br /><br />
    
 <?php   

//echo "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>";

echo '<a href="mis_iniciativas.php" class="link_button2" style="font-size:14px">Ver mis iniciativas</a>';

