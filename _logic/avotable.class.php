<?php

class avotable extends table_data {
    
    const enum_tipo_propuesta = 1;
    const enum_tipo_ilp = 2;
    const enum_tipo_pregunta = 3;
    
    const enum_estado_enviada = 0;
    const enum_estado_admitida = 1;
    const enum_estado_exitosa = 2;
    const enum_estado_cerrada = 3;
    const enum_estado_rechazada = 4;
                
    public $table_name = 'avotable';
    
    
    public $columns = array(
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
            'fecha_cerrada',
            'texto_pregunta',
            'id_comision',
            'id_parlamentario',
            'texto_respuesta'
    );
    
    public function init_config() {
        if ( $this->initialised ) return;      
        $this->columns_format  = array(
            'id' => 'number',
            'tipo' => array( 
                self::enum_tipo_propuesta => 'Propuesta',
                self::enum_tipo_ilp => 'ILP', 
                self::enum_tipo_pregunta => 'Pregunta' ),
            'titulo' =>'text',
            'codigo' => 'text',
            'resumen' => 'textarea',
            'descripcion' => 'textarea',
            'imagen' => 'image',
            'estado' => array( 
                0=>'Enviada',
                1=>'Admitida',
                2=>'Exitosa',
                3=>'Cerrada', 
                4=>'Rechazada' ),
            'votos' => 'number',
            'url_descripcion' => 'url',
            'url_articulo' => 'url',
            'url_video' => 'url',
            'id_usuario' => 'select',
            'texto_pregunta' => 'textarea',
            'id_comision'  => 'text',
            'id_parlamentario' => 'select',
            'texto_respuesta' => 'textarea',
            'fecha_creada' => 'datetime',
            'fecha_admitida' => 'datetime',
            'fecha_cerrada' => 'datetime'
        );
        
        if ( website::$user->is_in_group('administrador')) {
            $this->print_actions = true;
            $this->filter = true;
        }
        
        $this->key_set = new key_set('id');
        
        
        /* ****************************************************************** */
        parent::init_config();
        /* ****************************************************************** */
        $this->filter_fields = $this->columns_table_view;
        
        $cmd_select = new command_select(website::$base_url.'/administracion/votos.php/');
        $cmd_select->set_name("Apoyos");
        $this->add_command( $cmd_select );
        
        $this->get('id')->set_visible(false);
        $this->get('votos')->set_readonly();
        $this->get('fecha_creada')->set_readonly()->set_title('Fecha enviada');
        $this->get('fecha_admitida')->set_readonly()->set_use_seconds(false);
        $this->get('fecha_cerrada')->set_readonly()->set_use_seconds(false);
        //$this->get('fecha_admitida')->set_readonly();
        //$this->get('fecha_cerrada')->set_readonly();
        
        //$this->get('id_parlamentario')->set_nullify_empties();
        
        $this->get('id_usuario')->set_title('Creada por')->set_readonly();
        if ( isset($this->columns_col['imagen'] ) ) {
            $this->get('imagen')->set_generator_url(website::$base_url.'/get_img.php');
            $this->upload_dir = website::$base_dir.'/__upload/avotable/';
        }
        
        if ( $this->get_command_name() == 'new' ) {
            $this->get('fecha_creada')->set_default_value(Date('Y-m-d H:i:s'));
            $this->get('fecha_admitida')->set_visible(false);
            $this->get('fecha_cerrada')->set_visible(false);
            if ( isset($this->columns_col['texto_respuesta'] ) ) {
                $this->get('texto_respuesta')->set_visible(false);
            }
            $this->get('estado')->set_readonly()->set_default_value( avotable::enum_estado_enviada )->set_visible(false);
            $this->get('votos')->set_visible(false);
            $this->get('id_usuario')
                ->set_default_value( website::$user->get_id() )
                ->set_options( array( 
                    website::$user->get_id() => website::$user->get_full_name() ) 
            );
        }
    }
    public function after_init_values() {
        $this->set_creator_fullname();
    }
    function set_creator_fullname() { 
        $id_usu = $this->get('id_usuario')->get_value();
        $options_usu = $this->get('id_usuario')->get_options();
        if ( $id_usu && !isset($options_usu[$id_usu]) ) {
            $u = new fw_user($id_usu);
            $u->load();
            $this->get('id_usuario')->set_options(
                array( $id_usu => $u->get_fullname() )
            );       
        }
    }
}