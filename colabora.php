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
<div class="cabecera cab_colabora">
    <span>Colabora</span>
</div>

<p>
<h2>¿QUIERES COLABORAR CON ESTA PLATAFORMA? ELIGE UNA DE ESTAS DOS OPCIONES:</h2>

<div style="width: 47%; display:inline-block; vertical-align: top; padding-right: 2%;">
    <p><b>1. TENGO TIEMPO, PERO NO MUCHOS RECURSOS</b></p>
    
    <p><b>Colectivos sociales:</b> Integrantes de asociaciones, ONG y entidades que trabajan de cara
    a la comunidad, que se comprometan a canalizar sus iniciativas a través de la plataforma 
    Escaño110, de cara a nutrirla de contenidos para su puesta en marcha.</p>
    
    <p><b>Voluntari@s:</b> Para difundir el estreno de la plataforma en determinados eventos, 
    jornadas o seminarios que se organicen desde Escaño110.</p>
    
    <p><b>Vídeo:</b> Estudiantes de Comunicación Audiovisual o realizadores/as y editores/as de 
    vídeo amateur, a quienes apetezca hacer breves piezas (a modo de teaser) sobre alguna 
    de las iniciativas que tengan cabida en Escaño110.</p>
</div>
<div style="width: 47%; display:inline-block; vertical-align: top; padding-right: 2%;">
    <p><b>2. NO TENGO TIEMPO, PERO QUERRÍA APOYAR EL PROYECTO</b></p>
    
    <p><b>Sugiere:</b> Envíanos tus propuestas de temas que puedan ser objeto de iniciativas 
    (vinculantes o no) o sobre cuestiones que querrías ver tratadas en la web.</p>
    
    <p><b>Difunde:</b> Habla con tus contactos acerca de Escaño110. Comparte en redes sociales las 
    informaciones y propuestas que veas interesantes dentro de la plataforma. Copia este 
    widget y pégalo en el código fuente de tu página web, blog, etc.</p>
    
    <p><b>Dona:</b> Puedes hacer una aportación económica a esta plataforma, para hacerla 
    sostenible. De esta manera, podremos mantener la independencia que, creemos, este 
    proyecto necesita para que no se desvirtúe su objetivo de fomentar la participación 
    democrática y mantener un espíritu crítico con los agentes políticos.<br />
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="padding: 0 0; margin:0 0; text-align: center;">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="FYBF622FDMANL">
        <input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
        <img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
    </form>
    </p>
</div>
<p style="text-align: center">
    <br />
     Puedes ponerte en contacto con el equipo de Escaño110 escribiéndonos a <a href="mail:info@escaño110.org">info@escaño110.org</a>.
</p>
<script>document.getElementById('menu_colabora').className ='selected';</script>