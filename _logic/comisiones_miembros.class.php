<?php

class comisiones_miembros extends table_data {    
    public $columns = array(
        'id_comision',
        'id_parlamentario'
    );
    
    public $table_title = 'Miembros de la comisión';
    
    public function init_config() {
        if ( $this->initialised ) return;
        
        
        $miembros = website::$database->execute_get_associative_array('SELECT id, CONCAT(nombre, " ",apellidos) FROM parlamentarios ORDER BY nombre, apellidos'); 
              
        $this->columns_format  = array(
            'id_comision' => 'number',
            'id_parlamentario' => $miembros
        );
        $this->key_set = new key_set('id_comision','id_parlamentario');
        $this->filter = false;
        $this->print_actions = true;
        
        $cmd_nuevo = new command_new();
        $cmd_nuevo->set_name('Añadir miembro');
        $this->add_command($cmd_nuevo);
        
        $cmd_borrar = new command_delete();
        $cmd_borrar->set_name('Quitar miembro');
        $this->add_command($cmd_borrar);
        
        $this->add_command(new command_insert());
        $this->add_command(new command_insert_or_update());
        $this->add_command(new command_table());
        /* ****************************************************************** */
        parent::init_config();
        /* ****************************************************************** */
        $this->filter_fields = $this->columns_table_view;
        $this->get('id_comision')->set_visible(false);
        $this->get('id_parlamentario')->set_title('Parlamentario');

    }
}
