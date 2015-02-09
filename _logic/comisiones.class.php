<?php

class comisiones extends table_data {    
    public $columns = array(
        'id',
        'nombre'
        //'enabled'
    );
    
    public function init_config() {
        if ( $this->initialised ) return;      
        $this->columns_format  = array(
            'id' => 'number',
            'nombre' => 'text'
        );
        $this->columns_table_view = $this->columns;
        if ( website::$user->is_in_group('administrador')) {
            $this->print_actions = true;
            $this->filter = true;
        }
        $this->key_set = new key_set('id');
        $this->filter = true;
        
        /* ****************************************************************** */
        parent::init_config();
        /* ****************************************************************** */
        $this->filter_fields = $this->columns_table_view;
        
        $this->get('id')->set_visible(false);
        $cmd_select = new command_select('./comisiones_miembros.php/');
        $cmd_select->set_name("Miembros");
        $this->add_command( $cmd_select );
        
    }
}
