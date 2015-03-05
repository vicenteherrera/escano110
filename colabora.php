<?php

require_once('config.inc.php');

//Establecimiento del men�
//website::$current_page->menu = new menu_main();

//Carga del layout
website::load_layout('layout.inc.php');

//Comprobaci�n de usuario
//require "check_user.inc.php";
//===========================================================================================
?>
<div class="cabecera cab_colabora">
    <span>Colabora</span>
</div>

<p>
<h2>�QUIERES COLABORAR CON ESTA PLATAFORMA? ELIGE UNA DE ESTAS DOS OPCIONES:</h2>

<div style="width: 47%; display:inline-block; vertical-align: top; padding-right: 2%;">
    <p><b>1. TENGO TIEMPO, PERO NO MUCHOS RECURSOS</b></p>
    
    <p><b>Colectivos sociales:</b> Integrantes de asociaciones, ONG y entidades que trabajan de cara
    a la comunidad, que se comprometan a canalizar sus iniciativas a trav�s de la plataforma 
    Esca�o110, de cara a nutrirla de contenidos para su puesta en marcha.</p>
    
    <p><b>Voluntari@s:</b> Para difundir el estreno de la plataforma en determinados eventos, 
    jornadas o seminarios que se organicen desde Esca�o110.</p>
    
    <p><b>V�deo:</b> Estudiantes de Comunicaci�n Audiovisual o realizadores/as y editores/as de 
    v�deo amateur, a quienes apetezca hacer breves piezas (a modo de teaser) sobre alguna 
    de las iniciativas que tengan cabida en Esca�o110.</p>
</div>
<div style="width: 47%; display:inline-block; vertical-align: top; padding-right: 2%;">
    <p><b>2. NO TENGO TIEMPO, PERO QUERR�A APOYAR EL PROYECTO</b></p>
    
    <p><b>Sugiere:</b> Env�anos tus propuestas de temas que puedan ser objeto de iniciativas 
    (vinculantes o no) o sobre cuestiones que querr�as ver tratadas en la web.</p>
    
    <p><b>Difunde:</b> Habla con tus contactos acerca de Esca�o110. Comparte en redes sociales las 
    informaciones y propuestas que veas interesantes dentro de la plataforma. Copia este 
    widget y p�galo en el c�digo fuente de tu p�gina web, blog, etc.</p>
    
    <p><b>Dona:</b> Puedes hacer una aportaci�n econ�mica a esta plataforma, para hacerla 
    sostenible. De esta manera, podremos mantener la independencia que, creemos, este 
    proyecto necesita para que no se desvirt�e su objetivo de fomentar la participaci�n 
    democr�tica y mantener un esp�ritu cr�tico con los agentes pol�ticos.<br />
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="padding: 0 0; margin:0 0; text-align: center;">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="FYBF622FDMANL">
        <input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal. La forma r�pida y segura de pagar en Internet.">
        <img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
    </form>
    </p>
</div>
<p style="text-align: center">
    <br />
     Puedes ponerte en contacto con el equipo de Esca�o110 escribi�ndonos a <a href="mail:info@esca�o110.org">info@esca�o110.org</a>.
</p>
<script>document.getElementById('menu_colabora').className ='selected';</script>