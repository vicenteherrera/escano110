<?php

require_once('config.inc.php');

website::$current_page->add_style('
    .quienes_img {
        margin-bottom: 10px;
        float: left; margin-right: 20px;
        clear: left;
        
    }
');

//Establecimiento del menú
//website::$current_page->menu = new menu_main();

//Carga del layout
website::load_layout('layout.inc.php');

//Comprobación de usuario
//require "check_user.inc.php";
//===========================================================================================
?>


<div class="cabecera cab_quienes_somos">
    <span>Quiénes Somos</span>
</div>

<br style="clear: both;" />
<img src="img/quienes/raul_algarin_min.png" class="quienes_img" />
<h2>RAÚL ALGARÍN</h2>
Licenciado en Derecho (Universidad de Sevilla) y Master en Derechos Humanos (Univ. de Sarajevo) y en Estudios Islámicos (Univ. Oberta de Catalunya) ha trabajado en cooperación al desarrollo en Balcanes, en programas sociales internacionales de la Junta de Andalucía y ha sido durante años responsable de minorías en Amnistía Internacional Sevilla y portavoz de la Organización. Actualmente compagina la ejecución de proyectos sociales en el ámbito europeo con su trabajo como abogado en Círculo Jurídico.


<br style="clear: both;" />
<img src="img/quienes/rocio_dominguez_min.png" alt="Foto: ROCÍO DOMÍNGUEZ CEJUDO" class="quienes_img" />
<h2>ROCÍO DOMÍNGUEZ CEJUDO</h2>
Licenciada en Periodismo y en Antropología Sociocultural. Con el Máster Universitario en Investigación Aplicada en Estudios Feministas, de Género y Ciudadanía y en posesión del Certificado de Adaptación Pedagógica (CAP). Cuenta con más de diez años de experiencia laboral en el sector de la prensa. Del mismo modo, ha realizado las funciones propias de un gabinete de comunicación en distintas entidades, principalmente vinculadas al ámbito social y del Tercer Sector. Por otra parte, cuenta con experiencia en la docencia de talleres socioculturales, en diferentes áreas y para distintas edades.


<br style="clear: both;" />
<img src="img/quienes/jorge_fernandez_min.png" alt="Foto: JORGE FERNÁNDEZ SÁNCHEZ" class="quienes_img" />
<h2>JORGE FERNÁNDEZ SÁNCHEZ</h2>
Licenciado en Periodismo. Cuenta con dieciséis años de experiencia en el sector de la prensa escrita y el mundo editorial. Dentro de este sector, ha sido responsable de la creación de varias publicaciones de diversa temática. En los últimos años su trayectoria profesional ha derivado hacia el diseño gráfico y la publicidad, trabajando para diversas administraciones públicas. Además, ha sido responsable de la organización de congresos, programas formativos y desarrollo de identidades corporativas.


<br style="clear: both;" />
<img src="img/quienes/roman_martin_min.png" alt="Foto: ROMÁN MARTÍN SANTOS" class="quienes_img" />
<h2>ROMÁN MARTÍN SANTOS</h2>
Licenciado en Periodismo y Diploma de Estudios Avanzados por la Universidad de Sevilla. Además de haber trabajado en prensa y radio, los últimos 10 años ejerce en departamentos de comunicación de administraciones públicas con competencias en Servicios Sociales. En su faceta investigadora, pertenece al Grupo de Investigación de la Facultad de Comunicación de Sevilla ‘Medios, Políticas de Comunicación y Democracia en la Unión Europea’ y su tesis doctoral analiza el tratamiento de grupos vulnerables o en riesgo de exclusión en los medios de comunicación. Participa como docente en el Máster de Planificación Estratégica y Gestión de Cuentas de la Universidad de Sevilla. 
<br style="clear: both;" />

<img src="img/quienes/bruno_padilla_min.png" alt="Foto: BRUNO PADILLA DEL VALLE" class="quienes_img" />
<h2>BRUNO PADILLA DEL VALLE</h2>
Licenciado en Periodismo y Experto en Gestión Cultural. Cuenta con diez años de experiencia como redactor y técnico de comunicación, faceta ésta que ha desempeñado en los gabinetes de prensa de entidades sociales como el sindicato Comisiones Obreras, la ONG Red Araña y el Instituto Andaluz de la Juventud. En este último organismo de la Junta de Andalucía, ha trabajado los últimos cuatro años coordinando la comunicación web y las redes sociales, colaborando en la organización de eventos y en la redacción del II Plan Integral de Juventud de Andalucía.


<br style="clear: both;" />
<img src="img/quienes/vicente_herrera_min.png" alt="Foto: VICENTE HERRERA" class="quienes_img"  />

<h2>VICENTE HERRERA</h2> 
Ingenierio Informático por la Universidad de Sevilla e Ingeniero Técnico en Informática de Sistemas por la Universidad de Huelva. Desarrollador freelance especializado en capacitar a las organizaciones para realizar proyectos que incorporan elementos de alta complejidad tecnológica.

<br style="clear: both;" />

<h1 id="cofinanciadores">Cofinanciadores</h1>
<table>
    <tr><td style="width: 370px;">Catalina Torregrosa Mirón</td><td style="width: 370px;">Keith Kirkland</td><td style="width: 370px;">María Ángeles Domínguez</td></tr>
    <tr><td>Julián Tierno Magro</td><td>Carmen del Valle</td><td>Gonzalo y Álvaro Fernández</td></tr>
    <tr><td>José Manuel Gil Losada</td><td>Reyes Montiel Mesa</td><td>Antoni Gutiérrez-Rubí</td></tr>  
    <tr><td>Ana Domínguez</td><td>Mª Carmen Cejudo Rodríguez</td><td>Isabel Valle Rodríguez</td></tr>
    <tr><td>Marta y Lucía Delgado</td><td>José Antonio Fernández</td><td>Eduardo Robles</td></tr>
    <tr><td>Elena del Valle Uribe</td><td>Paco Padilla Escobar</td><td>Soledad Alonso Moreno</td></tr>
    <tr><td>Expectación Algarín</td><td>Rubén y Marina Martín</td><td>Jordi Gil</td></tr>
    <tr><td>Inmaculada Núñez Aguilera</td><td>Elena Gil del Valle</td><td>Aurelia Algarín Agüero</td></tr>
    <tr><td>José Luis Rodríguez Martínez</td><td>La Catedral Sumergida</td><td>María Esmeralda Martín Santos</td></tr>
    <tr><td>Paula Padilla del Valle</td><td>Ángela Agudo</td><td>Daniel Moraza Álvarez</td></tr>
    <tr><td>Fernando Barroso Vargas</td><td>Raúl Acevedo</td><td>Borja Porro</td></tr>
    <tr><td>Mar Caballero</td><td>Adela Morales Martínez</td><td>Esteban de Manuel Jerez</td></tr>
    <tr><td>José Manuel Zamora Moreno</td><td>Guillermo Quero Resina</td><td>UCI Hospital Virgen del Rocío de Sevilla</td></tr>
    <tr><td>Merce Lób</td><td>Juan Luis Gómez Morilla</td><td>Olivier Schulbaum</td></tr>
    <tr><td>Silvia Olivera Carvajal</td><td>Alejandro Blesa</td><td>Olga Quesada Torralva</td></tr>
    <tr><td>Matías Comino León</td><td>Alfonso Alba Cuesta</td><td>Amparo Cantalicio Torres</td></tr>
    <tr><td>Olga Montero</td><td>Marta Jiménez</td><td>Ana Picón Bellido</td></tr>
    <tr><td>Almudena Díaz Requena</td><td>Sergio R. López Alonso</td><td>David del Valle Morillo</td></tr>
    <tr><td>Pedro Jiménez</td><td>Miguel Hernández</td><td>Rogelio Rodríguez</td></tr>
    <tr><td>Ricardo Aussó Burguete</td><td>Olga Herranz Gimeno</td><td>Daniel Rodrigo</td></tr>
    <tr><td>Amalio Espinosa Barrios</td><td>María Ruiz Sánchez</td><td>José Antonio Ruiz Sánchez</td></tr>
    <tr><td>Marta Gómez</td><td>Juan Jesús Gómez de Lara</td><td>Paula Álvarez Benítez</td></tr>
    <tr><td>Antonio Fragero Guerra</td><td>Blanca García Carrera</td><td>Lucía Romero Luna</td></tr>
    <tr><td>Julio Alejandro Vicente Mateo</td><td>Beatriz González Aguilera</td><td>Ernest Payà i Montlleó</td></tr>
    <tr><td>Rafael Mira</td><td>Alberto Ortiz de Zarate</td><td>Lucía Valiente del Valle</td></tr>
    <tr><td>César Romero Pelegrín</td><td>Marina Llamas</td><td>Evangelina Milla Díaz</td></tr>
    <tr><td>Adelaida de la Peña</td><td>Rubén Díaz López</td><td>Antonio Guerrero</td></tr>
    <tr><td>Irene Hens Aumente</td><td>Rosario Pérez del Amo</td><td>Margarita Cano</td></tr>
    <tr><td>Alejandro Blanco Vallejo</td><td>Sara Pérez Muñoz</td><td>Candela Castro</td></tr>
    <tr><td colspan="3">Marcos Padilla</td></tr>
</table>



<script>document.getElementById('menu_quienes_somos').className ='selected';</script>