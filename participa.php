<?php

require_once('config.inc.php');

//Establecimiento del menú
//website::$current_page->menu = new menu_main();

//Carga del layout
website::load_layout('layout.inc.php');

//Comprobación de usuario
//require "check_user.inc.php";
//===========================================================================================
?>
<div class="cabecera cab_participa">
    <span>Participa</span>
</div>
<?php
    if ( empty( $_POST['command_'] ) ) {
?>
<div style="width: 31%; display:inline-block; vertical-align: top; padding-right: 2%; text-align: left;">
    <h2>ILP</h2> 
    <b>Una democracia abierta</b>
    <p>Logra firmas digitales para tu <b>Iniciativa Legislativa Popular</b> y consigue a fedatarios 

(personas que puedan recogerlas físicamente) a través de esta plataforma. Haremos 

seguimiento informativo de tu ILP y obtendrás difusión para la misma. Una vez alcanzadas las 

40.000 firmas necesarias –entre físicas y digitales–, podrás defenderla en el Parlamento de 

Andalucía, donde se debatirá su aprobación.</p>

</div>

<div style="width: 31%; display:inline-block; vertical-align: top; padding-right: 2%; text-align: left;">
    <h2>Preguntas</h2>
    <b>Un contacto directo</b>
    <p>Elige a cualquiera de los 109 parlamentarios andaluces para contactar de forma directa, 
    atendiendo a sus datos, formaciones políticas o las comisiones (o áreas) en las que participan. 
    Puedes realizar consultas sobre aquellos aspectos que te preocupan, recibiendo votos de 
    otros usuarios para convertirlas en preguntas de iniciativa ciudadana, que un diputado lleve al 
    Parlamento. Iremos contando los días que tarde cada parlamentario en contestar.</p>

</div>
<div style="width: 31%; display:inline-block; vertical-align: top; padding-right: 2%; text-align: left;">
    <h2>Propuestas</h2> 
    <b>Entre todos construimos</b>
    <p>Plantea tus demandas sobre aquellos aspectos en los que el Parlamento no tiene
    competencias o bien para saber, antes de preparar una ILP, cómo es acogida tu idea entre la 
    comunidad de usuarios de E110. Con tu propuesta, o bien tu apoyo a las ya existentes, 
    evidenciaremos aquellas cuestiones que realmente interesan a la ciudadanía andaluza, 
    tratando de incluirlas en la agenda mediática y política.</p>

</div>

<div style="width: 31%; display:inline-block; vertical-align: top; padding-right: 2%; text-align: center;">
    <?php
    if ( website::$user->is_logged_in() ) {
        echo '<a href="perfil/nueva_ilp.php" class="link_button2" style="position: relative; height: 15px; width: 110px; margin: 10px 0 0 0px;"><img 
        src="./img/tipos/ilp.png" alt="" style="position: absolute; top:-13px; left: -43px;">Presenta tu ILP</a>';
    }
    ?>
    </div>  
    <div style="width: 31%; display:inline-block; vertical-align: top; padding-right: 2%; text-align: center;">
        <?php
    if ( website::$user->is_logged_in() ) {
        echo '<a href="perfil/nueva_pregunta.php" class="link_button2" style="position: relative; height: 15px; width: 121px; margin: 10px 0 0 0px;"><img 
        src="./img/tipos/pregunta.png" alt="" style="position: absolute; top:-13px; left: -43px;">Lanza tu pregunta</a>';
    }
    ?>
    </div>
    <div style="width: 31%; display:inline-block; vertical-align: top; padding-right: 2%; text-align: center;">
        <?php
    if ( website::$user->is_logged_in() ) {
        echo '<a href="perfil/nueva_propuesta.php" class="link_button2" style="position: relative; height: 15px; width: 121px; margin: 10px 0 0 0px;"><img 
        src="./img/tipos/propuesta.png" alt="" style="position: absolute; top:-13px; left: -43px;">Haz tu propuesta</a>';
    }
    ?>
    </div>
  
<?php
}
if ( ! website::$user->is_logged_in() ) {
   
    $user = new users_register();
    $user->init_config();
    
    if ( $user->command_name == "" ) {
        echo "Rellena todos los campos del siguiente formulario para crear un usuario y participar en esta web.<br /><br />";
    }
    
    $user->__echo();
}
?>

<script>document.getElementById('menu_participa').className ='selected';</script>