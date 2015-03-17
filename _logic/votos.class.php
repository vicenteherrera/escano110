<?php

class votos extends table_data {
    
    public $columns = array(
        'id_usuario',
        'id_propuesta',
        'fecha',
        'tipo',
        //'xml_original',
        //'xml_firmado'
    );
    public $columns_table_view = array(
        'id_usuario',
        'id_propuesta',
        'fecha',
        'tipo',
        //'xml_original',
        //'xml_firmado'
    );
    public $table_title = 'Apoyos';
}