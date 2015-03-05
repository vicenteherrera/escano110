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
<div class="cabecera cab_contacto">
    <span>Contacto</span>
</div>

<p style="text-align: center">
    <br />
     Puedes ponerte en contacto con el equipo de Escaño110 escribiéndonos a <a href="mail:info@escaño110.org">info@escaño110.org</a>.
</p>


<script>document.getElementById('menu_contacto').className ='selected';</script>