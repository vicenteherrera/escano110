<?php
//TODO: Prevent not including

if ( ! website::$user->is_logged_in() ) {
    die('Sesión no iniciada');
}

echo "<div style=\"padding-left: 30px;\"><h1>Perfil de usuario</h1>";
echo "<div style=\"width: 450px; margin:20px 20px 9px 0; padding: 15px 15px; background-color: #eee; float: left;line-height: 20px;\">";
echo "<b>Email / Usuario:</b> ".website::$user->get('username')."<br />";
echo "<b>Nombre:</b> ".website::$user->get('name')."<br />";
echo "<b>Apellidos:</b> ".website::$user->get('surname')."<br />";
echo "</div>";
echo '<a href="'.website::$base_url.'/perfil/editar.php" class="link_button2" style="">Editar mis datos</a>';
echo '<a href="'.website::$base_url.'/fw-login.php?command_=logout" class="link_button2" style="">Cerrar sesión</a>';

echo "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>";

echo '<a href="mis_iniciativas.php" class="link_button2" style="">Ver mis iniciativas</a>  |  ';

echo '<a href="nueva_ilp.php" class="link_button2" style="">Proponer ILP</a>';
echo '<a href="nueva_propuesta.php" class="link_button2" style="">Proponer propuesta</a>';
echo '<a href="nueva_pregunta.php" class="link_button2" style="">Proponer pregunta</a>';

