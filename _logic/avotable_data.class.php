<?php

class avotable_data extends apersistant {
   public $id;
   public $tipo;
   public $titulo;
   public $codigo;
   public $resumen;
   public $descripcion;
   public $url_descripcion;
   public $url_articulo;
   public $url_video;
   public $imagen;
   public $estado;
   public $id_usuario;
   public $votos;
   public $fecha_creada;
   public $fecha_admitida;
   public $fecha_cerrada;
   public $texto_pregunta;
   public $id_comision;
   public $id_parlamentario;
   public $texto_respuesta;
   
   public $comunicado_oro;
   public $comunicado_plata;
   public $comunicado_bronce;
   
   public $_table_name = 'avotable';
   
   public function get_nombre_tipo() {
        switch($this->tipo) {
            case avotable::enum_tipo_ilp:
                return 'iniciativa';
            case avotable::enum_tipo_pregunta:
                return 'pregunta';
            case avotable::enum_tipo_propuesta:
                return 'propuesta';
        }
   }
   public function get_nombre_apoyos() {
        switch($this->tipo) {
            case avotable::enum_tipo_ilp:
                return 'firmas';
            case avotable::enum_tipo_pregunta:
                return 'votos';
            case avotable::enum_tipo_propuesta:
                return 'apoyos';
        }
   }
}