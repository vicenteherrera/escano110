<?php

class usuario extends fw_user implements ipersistant {

    public $id;
    public $type;
    public $username;
    public $password;
    public $description;
    public $web;
    public $avatar;
    public $name;
    public $surname; 
    public $email;
    public $group;
    public $date_of_birth;
    public $phone;
    public $notes;
    
    public function get_full_name() {
        $result = $this->name;
        if ( ! empty( $this->surname ) ) $result .= ' '.$this->surname;
        return $result;
    }
    public function get_statistics_text() {
        $sql = 'SELECT COUNT(1) AS num, estado, tipo FROM avotable WHERE id_usuario={@0}  GROUP BY estado, tipo ORDER BY tipo,estado';
        $data = website::$database->execute_get_array(new sql_str($sql,$this->id));
        $result = '<div style="width:170px; display:inline-block; vertical-align: top">';
        $prev_type = '';
        foreach($data as $row) {
            if ( $prev_type != '' && $prev_type != $row['tipo'] ) {
                $result .= '</div><div style="width:170px; display:inline-block; vertical-align: top">';
            }
            $prev_type = $row['tipo'];
            $result .= avotable::get_tipo_text($row['tipo']).'s '.strtolower(avotable::get_estado_text($row['estado'])).'s: '.$row['num'].'<br />';
        }
        $result .= '</div>';
        return $result;
    }
}