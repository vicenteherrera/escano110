<?php

class ilps extends avotable {
    
    function init_config() {
        if ( $this->initialised ) return;
        $this->table_title = 'Iniciativas Legislativas Populares';
        $this->columns = array(
            'id',
            'tipo',
            'titulo',
            'codigo',
            'resumen',
            'descripcion',
            'url_descripcion',
            'url_articulo',
            'url_video',
            'imagen',
            'estado',
            'id_usuario',
            'votos',
            'fecha_creada',
            'fecha_admitida',
            'fecha_cerrada'
        );
        $this->columns_table_view = array(
            'imagen',
            'titulo',
            'estado',
            'votos',
            'fecha_creada'
        ); 
        parent::init_config();
        $this->filter_fields = array(
            'imagen',
            'titulo',
            'estado',
            'votos',
            'fecha_creada'
        ); 
        $this->get('tipo')->set_restricted_value(avotable::enum_tipo_ilp);
        $this->get('votos')->set_title('Firmas');
     }
        
    
}
