<?php

class empresa extends apersistant implements ipersistant {
    public $id;
    public $nombre;
    public $descripcion;
    
    public $_table_name = 'empresas';
}

?>