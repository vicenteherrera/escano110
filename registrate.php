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
<div class="cabecera cab_que_es">
    <span>Regístrate</span>
</div>

<h1>Regístrate</h1>
<p>
Desde esta sección podrás registrarte para realizar tus apoyos y propuestas.
</p>
<p style="text-align: center">
    <br />
    <strong>Nuestra web se encuentra en elaboración, por favor, vuelva a consultar esta sección más adelante</strong>
</p>

<script>document.getElementById('menu_reqistrate').className ='selected';</script>