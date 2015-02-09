<?php

class parlamentario extends apersistant {
    public $id;
    public $nombre;
    public $apellidos;
    public $grupo_parlamentario;
    public $presentacion;
    public $foto;
    public $enabled;
    public $fecha_nacimiento;
    public $poblacion;
    public $circinscripcion;
    public $profesion;
    
    public $_comisiones;
    
    public $_table_name = 'parlamentarios';
    
    public $_fk_nm = array('_comisiones' => array('comision', 'comisiones_miembros'));
}