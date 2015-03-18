<?php

class votos extends table_data {
    
    public $columns = array(
        'name',
        'surname',
        'username',
        'id_propuesta',
        'fecha',
        'tipo',
        'id_propuesta',
        //'xml_original',
        //'xml_firmado'
        'id_usuario'
    );
    public $columns_table_view = array(
        'name',
        'surname',
        'username',
        'id_propuesta',
        'fecha',
        'id_propuesta',
        'id_usuario'
        //'tipo',
        //'xml_original',
        //'xml_firmado'
    );
    public $table_title = 'Apoyos';
    public $filter_ranges = array('fecha');
    public $filter_fields = array('name','surname','username');
    public function init_config() {
        if ( $this->initialised ) return true;
        
        $this->sql_from = 'votos INNER JOIN fw_users ON votos.id_usuario = fw_users.id';
        
        $this->columns_format['fecha'] = 'datetime';
        // ** Commands **
        
        $this->print_actions = true;
        $this->key_set = new key_set( array('id_usuario' ) );
        $cmd_select = new command_select(website::$base_url.'/usuarios.php');
        $cmd_select->set_name("Ver usuario");
        $cmd_select->set_redirect_column_name('id_usuario');
        $cmd_select->set_target_url_mask('?command_=print&id=');
        $this->add_command( new command_table() ); 
        $this->add_command( $cmd_select ); 
        $this->default_click_command = 'select';
        
        parent::init_config();
        
        $this->get('id_propuesta')->set_visible(false);
        $this->get('id_usuario')->set_visible(false);
        
        $this->get('fecha')->set_title('Fecha apoyo');
        
        $this->get('name')->set_original_table_name('fw_users')->set_title('Nombre');
        $this->get('surname')->set_original_table_name('fw_users')->set_title('Apellidos');
        $this->get('username')->set_original_table_name('fw_users');
          
    }
}