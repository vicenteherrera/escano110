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
    
    public static function get_estado_text($int_estado) {
        switch($int_estado) {
            case self::enum_estado_enviada :
                return 'Enviada';
            case self::enum_estado_admitida :
                return 'Admitida';
            case self::enum_estado_exitosa :
                return 'Exitosa';
            case self::enum_estado_cerrada :
                return 'Cerrada';
            case self::enum_estado_rechazada :
                return 'Rechazada';
        }
    }
    public static function get_tipo_text($int_tipo) {
        switch($int_tipo) {
            case self::enum_tipo_propuesta :
                return 'Propuesta';
            case self::enum_tipo_ilp :
                return 'ILP';
            case self::enum_tipo_pregunta :
                return 'Pregunta';
        }
    }
    
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
            'fecha_creada'   => 'datetime',
            'fecha_admitida' => 'datetime',
            'fecha_cerrada'  => 'datetime'
        );
        
        if ( website::$user->is_in_group('administrador')) {
            $this->print_actions = true;
            $this->filter = true;
        }
        
        $this->key_set = new key_set('id');
        
        $this->upload_size_limit = 1024*1024*1;
        
        /* ****************************************************************** */
        parent::init_config();
        /* ****************************************************************** */
        
        $this->get('titulo')
            ->set_limit_len(60)
            ->set_help_text('Indique un t�tulo de una sola linea para el elemento');
        
        if ( isset ( $this->columns_col['resumen'] ) ) {
            $this->get('resumen')
                ->set_limit_len(230)
                ->set_help_text('Indique un breve resumen para la miniatura del elemento');
        }  
        if ( isset ( $this->columns_col['descripcion'] ) ) {
            $this->get('descripcion')
                ->set_limit_len(2500)
                ->set_help_text('Indique el texto descriptivo completo del art�culo');
        }
        if ( isset ( $this->columns_col['texto_pregunta'] ) ) {
            $this->get('texto_pregunta')
                ->set_limit_len(2000)
                ->set_help_text('Indique el texto de la preguta que desea realizar al parlamentario o parlamentaria');
        }
        if ( isset ( $this->columns_col['url_descripcion'] ) ) {
            $this->get('url_descripcion')
                ->set_help_text('Si lo desea, proporcione un enlace donde se especifique con m�s detalle los objetivos de este elemento');
        }
        if ( isset ( $this->columns_col['url_articulo'] ) ) {
            $this->get('url_articulo')
                ->set_visible(false)
                ->set_help_text('Indique la URL del art�culo del blog de Esca�o 110 donde se menciona este elemento');
        }
        if ( isset ( $this->columns_col['url_video'] ) ) {
            $this->get('url_video')
                ->set_help_text('Si lo desea, proporcione un enlace a un video de Youtube donde se describa este elemento');
        }
        if ( isset ( $this->columns_col['codigo'] ) ) {
            $this->get('codigo')
                ->set_limit_len(10)
                ->set_help_text('Proporcione el c�digo con el que ha sido registrada la ILP');
        
        }
        
        $this->filter_fields = array_diff($this->columns_table_view,array('imagen','votos'));
        $this->filter_ranges = array( 'votos' );
        $cmd_select = new command_select(website::$base_url.'/administracion/votos.php/');
        $cmd_select->set_name("Apoyos");
        $this->add_command( $cmd_select );
        
        $this->get('id')->set_visible(false);
        $this->get('votos')->set_readonly();
        $this->get('fecha_creada')->set_readonly(true)->set_title('Fecha creaci�n');
        $this->get('fecha_admitida')->set_readonly(true)->set_use_seconds(true);
        $this->get('fecha_cerrada')->set_readonly(false)->set_use_seconds(true);
        
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
            $this->get('estado')->set_readonly()->set_default_value( avotable::enum_estado_enviada );
            $this->get('votos')->set_visible(false);
            $this->get('id_usuario')
                ->set_default_value( website::$user->get_id() )
                ->set_options( array( 
                    website::$user->get_id() => website::$user->get_full_name() ) 
            );
        }
    }
    
    public function after_insert_or_update() {
        //TODO: Only run this if it's a state change
        //var_dump($this->get('estado')->get_value() ); die;
        $this->send_email_state_changed();
    }
    public function is_state_changed() {
        return true;
    }
    public function after_init_values() {
        $this->set_creator_fullname(); 
        if ( $this->get_command_name() == 'update' ) {
            if ( $this->get('estado')->has_changed() ) {
                if ( $this->get('estado')->get_value() == self::enum_estado_admitida ) {
                    if ( $this->get('fecha_admitida')->get_value() == '' ) {          
                        $this->get('fecha_admitida')->set_value( date('Y-m-d H:i:s') )->set_changed();
                    }
                    if ( $this->get('fecha_cerrada')->get_value() == '' ) {
                        switch($this->get('tipo')->get_value()) {
                            case avotable::enum_tipo_ilp:
                                $this->get('fecha_cerrada')->set_value(date('Y-m-d 23:59:59', strtotime("+6 months", strtotime(date('Y-m-d')))))
                                    ->set_changed(); 
                            break;
                            case avotable::enum_tipo_propuesta:
                                $this->get('fecha_cerrada')->set_value(date('Y-m-d 23:59:59', strtotime("+3 months", strtotime(date('Y-m-d')))))
                                    ->set_changed();
                            break;
                        }
                    }
                    
                } else if ( ( $this->get('estado')->get_value() == self::enum_estado_cerrada || 
                              $this->get('estado')->get_value() == self::enum_estado_exitosa ||
                              $this->get('estado')->get_value() == self::enum_estado_rechazada ) && 
                                $this->get('fecha_cerrada')->get_value() == '' ) {
                    $this->get('fecha_cerrada')->set_value( date('Y-m-d H:i:s') )->set_changed();            
                }
            }
        } 
    }
    protected function set_creator_fullname() { 
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
    public function send_email_state_changed() {
        if ( $this->get('estado')->has_changed() || $this->get_command_name() == 'insert' ) {
            $avotable = new avotable_data();
            $avotable->set_data($this->columns_col->get_array());
            $email = new email_cambio_estado();
            $email->set_avotable_data($avotable);
            $email->send();
        }
    }

}