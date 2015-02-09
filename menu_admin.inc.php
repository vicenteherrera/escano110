<?php

if ( website::$user->is_in_group('administrador')) {
    ?>
        <div id="menu_superior" style="background-color: #666; font-size: 13px;">
            <a href="<?php echo website::$base_url; ?>/ilps.php">ILPs</a>
        	<a href="<?php echo website::$base_url; ?>/propuestas.php">PROPUESTAS</a>
            <a href="<?php echo website::$base_url; ?>/preguntas.php">PREGUNTAS</a>
            <a href="<?php echo website::$base_url; ?>/parlamentarios.php">PARLAMENTARIOS</a>
            <a href="<?php echo website::$base_url; ?>/comisiones.php">COMISIONES</a>
        	<a href="<?php echo website::$base_url; ?>/usuarios.php">USUARIOS</a>
        </div>
    <?php
}