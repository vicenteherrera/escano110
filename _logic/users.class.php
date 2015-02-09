<?php

class users extends table_data {
    
    public $table_name = 'fw_users';
    public $table_title = 'Usuarios';
    public $record_title = 'Usuario';
    
    public function init_config() {
        
        $this->columns = array(
            'id',
            'username',
            'password',
            'name',
            'surname', 
            'email',
            'group',
            'date_of_birth',
            'phone',
            'notes'
        );
        $this->columns_title = array(
            'id'        => 'Código',
            'username'  => 'Usuario',
            'password'  => 'Contraseña',
            'name'      => 'Nombre',
            'surname'   => 'Apellidos', 
            'email'     => 'Email',
            'group'     => 'Grupo',
            'date_of_birth' => 'Fecha de nacimiento',
            'phone'     => 'Teléfono',
            'notes'     => 'Observaciones'
        );
        $this->columns_format = array(
            'id'        => 'text',
            'username'  => 'text',
            'password'  => 'password',
            'group'     => website::$user->group_names,
            'name'      => 'text',
            'surname'   => 'text',
            'date_of_birth' => 'date',  
            'email'     => 'email',
            'phone'     => 'text',
            'notes'     => 'textarea'
        );
        $this->columns_table_view = array(
            'username',
            'name',
            'surname', 
            'email',
            'group'
            //'id_empresa'
        );
        $this->key_set = new key_set('id'); 
        
        $this->print_actions = true;
        
        //----------------------------------------------------
        parent::init_config();
        
        $this->get('id')->set_visible(false);
        
        $this->get('username')
            ->add_validation_rule(new validation_unique())
            ->set_required();
            
        if ( $this->command_name != 'new' ) {
            $this->get('username')->set_readonly();
        }
        
        $this->get('password')->set_required();
        

        //--------------------------------------------------
        /*
        $this->set('id_empresa',new column_select())
            ->set_options(empresas::get_options_array())
            ->set_title('Empresa');
        */
    }
}

?>