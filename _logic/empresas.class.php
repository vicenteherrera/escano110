<?php

    class empresas extends table_data {
        
        
        public $columns = array(
            'id',
            'clase',
            'cif',
            'razon_social',
            'tipologia',
            'objeto_social',
            'provincia',
            'municipio',
            'codigo_postal',
            'direccion',
            'telefono1',
            'telefono2',
            'fax',
            'email',
            'descripcion'
        );
        
        public $columns_table_view = array(
            'cif',
            'razon_social',
            'tipologia',
            'objeto_social',
            'provincia',
            'codigo_postal',
        );
        
        public $table_title = "Empresas";
        public $record_title = "Empresa";
        
        
        
        function init_config() {
            if ($this->initialised) return;
            
            
            $this->columns_format['provincia'] = array(
                'ALMERÍA' => 'Almería',
                'CÁDIZ'=>'Cádiz',
                'CÓRDOBA'=>'Córdoba',
                'GRANADA'=>'Granada',
                'HUELVA'=>'Huelva',
                'JAÉN'=>'Jaén',
                'SEVILLA'=>'Sevilla',
                'MÁLAGA'=>'Málaga'
            );
            
            $this->print_actions = acl::can_edit_empresas();

            $this->filter_fields = array(
                'cif',
                'razon_social',
                'tipologia',
                'objeto_social',
                'provincia',
                'municipio',
                'codigo_postal',
                'descripcion'
            );    
            
            $this->key_set = new key_set('id');
            parent::init_config();
            
            $this->get('clase')->set_visible(false);
        
        }
        
        public static function get_options_array() { 
            $result = array( '' => '- seleccione empresa -' ) +
                      website::$database->execute_get_associative_array("SELECT id, LEFT(razon_social,40) as razon_social from empresas");
            return $result;
        }
    }
    
?>