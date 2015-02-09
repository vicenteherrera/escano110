<?php

class menu_main extends menu_simple {

        
    public function get_menu() {
        if ( ! website::$user->is_logged_in() ) return;
        $result = '';
        //if ( website::$user->is_in_any_group(array('administrador') ) ) {
            
             $result = '
             <ul id="menu_title" onclick="javascript:switch_menu();">
                <li class="menu_title">MESSE</li>
             </ul>
             <ul class="menu_main">
                <li><a href="'.website::$base_url.'/index.php">MESSE</a>
                    <ul>
                        <li><a href="'.website::$base_url.'/que_es_messe.php">Qué es MESSE</a></li>
                    </ul>
                </li>
                <li><a href="'.website::$base_url.'/economia_social_en_europa.php">Economía social en Europa</a>
                    <ul>
                        <li><a href="'.website::$base_url.'/intercambio_europeo.php">Intercambio Europeo</a>
                            <ul>
                                <li><a href="'.website::$base_url.'/buenas_practicas_messe.php">Buenas prácticas MESSE</a></li>
                                <li><a href="'.website::$base_url.'/posibilades_colaboracion_eu.php">Posibilidades de colaboración en Europa</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="'.website::$base_url.'/economia_social_en_andalucia.php">Economía Social en Andalucía</a>
                    <ul>
                        <li><a href="'.website::$base_url.'/infraestructura_general.php">Infraestructura general de economía social en España y Andalucía</a>
                            <ul>
                                <li><a href="'.website::$base_url.'/empresas_de_insercion.php">Empresas de inserción (desde SEMPIN)</a></li>
                                <li><a href="'.website::$base_url.'/cooperativas.php">Cooperativas</a></li>
                                <li><a href="'.website::$base_url.'/sociedades_laborales.php">Sociedades Laborales</a></li>
                                <li><a href="'.website::$base_url.'/centros_especiales_de_empleo.php">Centros especiales de empelo</a></li>
                            </ul>
                        </li>
                        <li><a href="'.website::$base_url.'/informe_de_necesidades.php">Informe de necesidades</a>
                            <ul>
                                <li><a href="'.website::$base_url.'/definicion.php">Definición</a></li>
                                <li><a href="'.website::$base_url.'/guia_de_constitucion.php">Guía de constitución</a></li>
                                <li><a href="'.website::$base_url.'/bibliografia.php">Bibliografía</a></li>
                                <li><a href="'.website::$base_url.'/enlaces.php">Enlaces</a></li>
                                <li><a href="'.website::$base_url.'/organismos_e_instituciones_apoyo.php">Organismos e instituciones de apoyo</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
             </ul>
            ';
        //}
        return $result;
    }
}