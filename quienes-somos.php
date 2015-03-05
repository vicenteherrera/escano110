<?php

require_once('config.inc.php');

website::$current_page->add_style('
    .quienes_img {
        margin-bottom: 10px;
        float: left; margin-right: 20px;
        clear: left;
        
    }
');

//Establecimiento del men�
//website::$current_page->menu = new menu_main();

//Carga del layout
website::load_layout('layout.inc.php');

//Comprobaci�n de usuario
//require "check_user.inc.php";
//===========================================================================================
?>


<div class="cabecera cab_quienes_somos">
    <span>Qui�nes Somos</span>
</div>

<br style="clear: both;" />
<img src="img/quienes/raul_algarin_min.png" class="quienes_img" />
<h2>RA�L ALGAR�N</h2>
Licenciado en Derecho (Universidad de Sevilla) y Master en Derechos Humanos (Univ. de Sarajevo) y en Estudios Isl�micos (Univ. Oberta de Catalunya) ha trabajado en cooperaci�n al desarrollo en Balcanes, en programas sociales internacionales de la Junta de Andaluc�a y ha sido durante a�os responsable de minor�as en Amnist�a Internacional Sevilla y portavoz de la Organizaci�n. Actualmente compagina la ejecuci�n de proyectos sociales en el �mbito europeo con su trabajo como abogado en C�rculo Jur�dico.


<br style="clear: both;" />
<img src="img/quienes/rocio_dominguez_min.png" alt="Foto: ROC�O DOM�NGUEZ CEJUDO" class="quienes_img" />
<h2>ROC�O DOM�NGUEZ CEJUDO</h2>
Licenciada en Periodismo y en Antropolog�a Sociocultural. Con el M�ster Universitario en Investigaci�n Aplicada en Estudios Feministas, de G�nero y Ciudadan�a y en posesi�n del Certificado de Adaptaci�n Pedag�gica (CAP). Cuenta con m�s de diez a�os de experiencia laboral en el sector de la prensa. Del mismo modo, ha realizado las funciones propias de un gabinete de comunicaci�n en distintas entidades, principalmente vinculadas al �mbito social y del Tercer Sector. Por otra parte, cuenta con experiencia en la docencia de talleres socioculturales, en diferentes �reas y para distintas edades.


<br style="clear: both;" />
<img src="img/quienes/jorge_fernandez_min.png" alt="Foto: JORGE FERN�NDEZ S�NCHEZ" class="quienes_img" />
<h2>JORGE FERN�NDEZ S�NCHEZ</h2>
Licenciado en Periodismo. Cuenta con diecis�is a�os de experiencia en el sector de la prensa escrita y el mundo editorial. Dentro de este sector, ha sido responsable de la creaci�n de varias publicaciones de diversa tem�tica. En los �ltimos a�os su trayectoria profesional ha derivado hacia el dise�o gr�fico y la publicidad, trabajando para diversas administraciones p�blicas. Adem�s, ha sido responsable de la organizaci�n de congresos, programas formativos y desarrollo de identidades corporativas.


<br style="clear: both;" />
<img src="img/quienes/roman_martin_min.png" alt="Foto: ROM�N MART�N SANTOS" class="quienes_img" />
<h2>ROM�N MART�N SANTOS</h2>
Licenciado en Periodismo y Diploma de Estudios Avanzados por la Universidad de Sevilla. Adem�s de haber trabajado en prensa y radio, los �ltimos 10 a�os ejerce en departamentos de comunicaci�n de administraciones p�blicas con competencias en Servicios Sociales. En su faceta investigadora, pertenece al Grupo de Investigaci�n de la Facultad de Comunicaci�n de Sevilla �Medios, Pol�ticas de Comunicaci�n y Democracia en la Uni�n Europea� y su tesis doctoral analiza el tratamiento de grupos vulnerables o en riesgo de exclusi�n en los medios de comunicaci�n. Participa como docente en el M�ster de Planificaci�n Estrat�gica y Gesti�n de Cuentas de la Universidad de Sevilla. 
<br style="clear: both;" />

<img src="img/quienes/bruno_padilla_min.png" alt="Foto: BRUNO PADILLA DEL VALLE" class="quienes_img" />
<h2>BRUNO PADILLA DEL VALLE</h2>
Licenciado en Periodismo y Experto en Gesti�n Cultural. Cuenta con diez a�os de experiencia como redactor y t�cnico de comunicaci�n, faceta �sta que ha desempe�ado en los gabinetes de prensa de entidades sociales como el sindicato Comisiones Obreras, la ONG Red Ara�a y el Instituto Andaluz de la Juventud. En este �ltimo organismo de la Junta de Andaluc�a, ha trabajado los �ltimos cuatro a�os coordinando la comunicaci�n web y las redes sociales, colaborando en la organizaci�n de eventos y en la redacci�n del II Plan Integral de Juventud de Andaluc�a.


<br style="clear: both;" />
<img src="img/quienes/vicente_herrera_min.png" alt="Foto: VICENTE HERRERA" class="quienes_img"  />

<h2>VICENTE HERRERA</h2> 
Ingenierio Inform�tico por la Universidad de Sevilla e Ingeniero T�cnico en Inform�tica de Sistemas por la Universidad de Huelva. Desarrollador freelance especializado en capacitar a las organizaciones para realizar proyectos que incorporan elementos de alta complejidad tecnol�gica.

<br style="clear: both;" />

<h1 id="cofinanciadores">Cofinanciadores</h1>
<table>
    <tr><td style="width: 370px;">Catalina Torregrosa Mir�n</td><td style="width: 370px;">Keith Kirkland</td><td style="width: 370px;">Mar�a �ngeles Dom�nguez</td></tr>
    <tr><td>Juli�n Tierno Magro</td><td>Carmen del Valle</td><td>Gonzalo y �lvaro Fern�ndez</td></tr>
    <tr><td>Jos� Manuel Gil Losada</td><td>Reyes Montiel Mesa</td><td>Antoni Guti�rrez-Rub�</td></tr>  
    <tr><td>Ana Dom�nguez</td><td>M� Carmen Cejudo Rodr�guez</td><td>Isabel Valle Rodr�guez</td></tr>
    <tr><td>Marta y Luc�a Delgado</td><td>Jos� Antonio Fern�ndez</td><td>Eduardo Robles</td></tr>
    <tr><td>Elena del Valle Uribe</td><td>Paco Padilla Escobar</td><td>Soledad Alonso Moreno</td></tr>
    <tr><td>Expectaci�n Algar�n</td><td>Rub�n y Marina Mart�n</td><td>Jordi Gil</td></tr>
    <tr><td>Inmaculada N��ez Aguilera</td><td>Elena Gil del Valle</td><td>Aurelia Algar�n Ag�ero</td></tr>
    <tr><td>Jos� Luis Rodr�guez Mart�nez</td><td>La Catedral Sumergida</td><td>Mar�a Esmeralda Mart�n Santos</td></tr>
    <tr><td>Paula Padilla del Valle</td><td>�ngela Agudo</td><td>Daniel Moraza �lvarez</td></tr>
    <tr><td>Fernando Barroso Vargas</td><td>Ra�l Acevedo</td><td>Borja Porro</td></tr>
    <tr><td>Mar Caballero</td><td>Adela Morales Mart�nez</td><td>Esteban de Manuel Jerez</td></tr>
    <tr><td>Jos� Manuel Zamora Moreno</td><td>Guillermo Quero Resina</td><td>UCI Hospital Virgen del Roc�o de Sevilla</td></tr>
    <tr><td>Merce L�b</td><td>Juan Luis G�mez Morilla</td><td>Olivier Schulbaum</td></tr>
    <tr><td>Silvia Olivera Carvajal</td><td>Alejandro Blesa</td><td>Olga Quesada Torralva</td></tr>
    <tr><td>Mat�as Comino Le�n</td><td>Alfonso Alba Cuesta</td><td>Amparo Cantalicio Torres</td></tr>
    <tr><td>Olga Montero</td><td>Marta Jim�nez</td><td>Ana Pic�n Bellido</td></tr>
    <tr><td>Almudena D�az Requena</td><td>Sergio R. L�pez Alonso</td><td>David del Valle Morillo</td></tr>
    <tr><td>Pedro Jim�nez</td><td>Miguel Hern�ndez</td><td>Rogelio Rodr�guez</td></tr>
    <tr><td>Ricardo Auss� Burguete</td><td>Olga Herranz Gimeno</td><td>Daniel Rodrigo</td></tr>
    <tr><td>Amalio Espinosa Barrios</td><td>Mar�a Ruiz S�nchez</td><td>Jos� Antonio Ruiz S�nchez</td></tr>
    <tr><td>Marta G�mez</td><td>Juan Jes�s G�mez de Lara</td><td>Paula �lvarez Ben�tez</td></tr>
    <tr><td>Antonio Fragero Guerra</td><td>Blanca Garc�a Carrera</td><td>Luc�a Romero Luna</td></tr>
    <tr><td>Julio Alejandro Vicente Mateo</td><td>Beatriz Gonz�lez Aguilera</td><td>Ernest Pay� i Montlle�</td></tr>
    <tr><td>Rafael Mira</td><td>Alberto Ortiz de Zarate</td><td>Luc�a Valiente del Valle</td></tr>
    <tr><td>C�sar Romero Pelegr�n</td><td>Marina Llamas</td><td>Evangelina Milla D�az</td></tr>
    <tr><td>Adelaida de la Pe�a</td><td>Rub�n D�az L�pez</td><td>Antonio Guerrero</td></tr>
    <tr><td>Irene Hens Aumente</td><td>Rosario P�rez del Amo</td><td>Margarita Cano</td></tr>
    <tr><td>Alejandro Blanco Vallejo</td><td>Sara P�rez Mu�oz</td><td>Candela Castro</td></tr>
    <tr><td colspan="3">Marcos Padilla</td></tr>
</table>



<script>document.getElementById('menu_quienes_somos').className ='selected';</script>