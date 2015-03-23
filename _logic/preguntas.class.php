<?php

class preguntas extends avotable {
    
    function init_config() {
        if ( $this->initialised ) return;
        $this->table_title = 'Preguntas';
        $this->columns = array(
            'id',
            'tipo',
            'titulo',
            'texto_pregunta',
            'texto_respuesta',
            'id_parlamentario',
            'estado',
            'id_usuario',
            'votos',
            'fecha_creada',
            'fecha_admitida',
            'fecha_cerrada'
            //'id_comision',
            
        );
        $this->columns_table_view = array(
            'titulo',
            'id_parlamentario',
            'estado',
            'votos',
            'fecha_creada',
        );
        $this->columns_required = array(
            'titulo',
            'texto_pregunta'
        );
        parent::init_config();
        
        $this->get('estado')->set_options(
            array( 
                0=>'Enviada',
                1=>'Admitida',
                2=>'Respondida',
                3=>'Cerrada', 
                4=>'Rechazada'
            )
        );
        $this->get('id_parlamentario')->set_options(
            website::$database->execute_get_associative_array(new sql_str("SELECT id, CONCAT(nombre, ' ',apellidos) as nombre_y_apellidos from parlamentarios ORDER BY nombre, apellidos")))
            ->set_title('Parlamentario');
        $this->get('tipo')->set_restricted_value( avotable::enum_tipo_pregunta );
        $this->get('titulo')->set_title('Asunto');
        $this->get('votos')->set_title('Apoyos');
        $this->get('fecha_cerrada')->set_title('Fecha respondida');
        //$this->control_group = new control_edit($this);
        //$this->control_group->add(array('titulo'));
     }
        
    
}
