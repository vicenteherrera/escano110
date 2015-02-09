<?php

if ( ! website::$user->is_logged_in() ) {
    //echo '<h1>Cuestionario de Necesidades Formativas</h1><br />';
    echo '<div style="margin: 20px auto; width: 255px; padding: 20px 40px; border:1px solid #ccc; border-radius: 5px; text-align:center;">Debe iniciar sesión para continuar<br /><br />';
   	$target = new url("fw-login.php");
    $target->set_var('return_url',url::get_request_url());
    echo '<a href="'.$target->__toString().'" class="link_button">Ir a inicio de sesión</a><br />';
    //echo '<center><img src="'.website::$base_url.'/img/imastres_mundo2.jpg" alt="" /></center>';
    exit;
    return;
}

