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
<div class="cabecera cab_descargas">
    <span>Descargas</span>
</div>
<br /><br />
<div style="width:50%; text-align: center; float: left;">
    <a href="descargas/guia_ilp.pdf" target="_blank">Descarga la guía práctica para elaborar una Iniciativa Legislativa Popular<br /><br />
        <img src="img/guia_ilp_min.png" alt="" /></a>
</div>
<div style="width:50%; text-align: center;  float: left;">
    <a href="https://github.com/vicenteherrera/escano110" target="_blank">Descarga el código fuente de este sitio desde GitHub<br /><br />
        <img src="img/GitHub-Mark-120px-plus.png" alt="" /></a>
        <br /><br /><br /><br /><br /><br />
        <div>Icons made by <a href="http://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>
</div>
<br style="clear:both" />

<script>document.getElementById('menu_descargas').className ='selected';</script>