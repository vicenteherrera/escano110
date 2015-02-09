<?php
    class anamed extends table_data {
        function init_config() {
            if ($this->initialised) return;
            
            $this->columns = array_merge(array('id'),$this->columns);
            $this->columns[] = 'nombre';          
            $this->columns[] = 'descripcion';
            $this->columns[] = 'id_empresa';
            $this->columns_format['id_empresa'] = 'select';
            $this->order_column='nombre';
            
            parent::init_config();
            
            $this->print_actions = true;
            
            $this->key_set = new key_set('id');
            $this->columns_col->get('id')
                ->set_title('Número')
                //->set_visible(false)
                ->set_readonly();
            
            //$this->control_group = new control_edit($this);
            //$this->control_group->set_title($this->table_title);	
            //$this->control_group->add($this->columns);
            
            
        }
        
    }
?>