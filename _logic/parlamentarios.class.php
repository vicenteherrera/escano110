<?php

class parlamentarios extends table_data {    
    
    /**
     * @var Array Nombre del grupo parlamentario
     */
    public static $grupos_parlamentarios_array = array(
        0=>'',
        1=>'Partido Socialista Obrero Español de Andalucía',
        2=>'Partido Popular',
        3=>'Izquierda Unida Los Verdes-Convocatoria por Andalucía'
    );
    
    public $columns = array(
        'id',
        'foto',
        'nombre',
        'apellidos',
        'presentacion',
        'grupo_parlamentario',
        'circinscripcion',
        'profesion',
        'fecha_nacimiento',
        'poblacion',
        //'enabled'
    );
    
    public function init_config() {
        if ( $this->initialised ) return;      
        $this->columns_format  = array(
            'id' => 'number',
            'nombre' => 'text',
            'apellidos' => 'text',
            'presentacion' => 'textarea',
            'grupo_parlamentario' => self::$grupos_parlamentarios_array,
            'foto' => 'image',
            'fecha_nacimiento' => 'date',
            'poblacion' => 'text',
            'circinscripcion' => info::get_provincias_andalucia(),
            'profesion' => 'text',
            //'enabled'
        );
        
        if ( website::$user->is_in_group('administrador')) {
            $this->print_actions = true;
            $this->filter = true;
        }
        $this->key_set = new key_set('id');
        $this->filter = true;
        $this->columns_table_view = array(
            'foto',
            'nombre',
            'apellidos',
            'grupo_parlamentario',
            'circinscripcion'
        );
        $this->pag_items_pag = 21;
        $this->order_default_column = 'nombre';

        /* ****************************************************************** */
        parent::init_config();
        /* ****************************************************************** */
        $this->filter_fields = $this->columns_table_view;
        
        $this->get('id')->set_visible(false);
        $this->get('circinscripcion')->set_title('Circunscripción');
        $this->get('poblacion')->set_title('Población nacimiento');
        $this->get('foto')->set_generator_url(website::$base_url.'/get_img_parlamentario.php');


        
    }
}
