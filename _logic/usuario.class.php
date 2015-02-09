<?php

class usuario extends fw_user implements ipersistant {

    public $id_empresa;
    public $_empresa;
    
    public $_fk_1n = array( 
        '_empresa' => array( 'empresa' => 'id_empersa' ) 
    );

}