<?php

class email_logro extends email {
    
    /**
     * @var avotable_data
     */
    private $avotable_data;
    
    /**
     * @var logro
     */
    private $logro;
    
    public function set_avotable_data(avotable_data $data) {
        $this->avotable_data = $data;
    }
    public function set_logro(logro $logro) {
        $this->logro = $logro;
    }
    private function get_user() {
        $id_user = $this->avotable_data->id_usuario;
        $user = new fw_user($id_user);
        $user->load();
        return $user;
    }
    
    public function send() {
        $user = $this->get_user();
        $to = $user->id;
        $nombre = $user->name;
        $apellidos = $user->surname;
        
        $default_web_page_title = 'Escaño 110';
        $base_url = 'http://www.escaño110.org';
        //$url_act = $base_url.'/perfil/activate.php?k='.$key_act;
        
        //$enlace = '<a style="padding: 3px 6px; border-radius: 4px; color:#fff; background-color:#6E6473; text-decoration:none;" href="'.$url_act.'">'.
        //    $url_act.'</a>';
        
		$message  = '<div style="background-color: #CECFCF; padding: 10px 20px; width: 100%; color: #6E6473;">';
        $message .= '<div style="background-color: #F7F3F0; padding: 7px 20px 5px 20px; width: 650px; margin: 0 auto;">';
        $message .= '<h1><img src="'.$base_url.'/img/logo.png" alt="Escaño 110"></h1>'; //'.$default_web_page_title.'</h1>';
        $message .= '</div>';
        $message .= '<div style="background-color: #FFFFFF; padding: 20px 20px; width: 650px; margin: 0 auto;">';
        $message .= '<i>Este es un mensaje de aviso automático del portal <a href="http://'.$base_url.'">'.$base_url.'</a></i><br /><br /><br />';
        $message .= $this->get_message();
        $message .= '</div></div>';
        
        $this->message_html = $message;
        $this->from = '"Escaño110" <info@escaño110.org>';
        $this->to = 'vicenteherrera@vicenteherrera.com';
        $this->subject = $this->get_subject();
        parent::send();
        
        $this->to = 'info@escaño110.org';
        //parent::send();
        
    }
    private function get_subject() {
        $pre = '[#'.$this->avotable_data->id.'] ';
        $pre .= ucfirst($this->avotable_data->get_nombre_tipo()).' ';
        return $pre.'exitosa';
    }
    private function get_message() {
        return $this->get_message_exitosa();
    }
    private function get_url() {
        $base = 'propuesta';
        $url =  'http://www.escaño110.org/propuesta.php?id='.$this->avotable_data->id;
        $url = '<a href="'.$url.'">'.$url.'</a>';
        return $url;
    }

    function get_message_exitosa() {
        $result = 'Tu '.$this->avotable_data->get_nombre_tipo().' en Escaño110 ha alcanzado el logro '; 
        if ( isset( $this->logro ) ) $result .= strtoupper($this->logro->get_nombre_logro()).':<br />';
        else $result .= 'Exitosa:<br />';
        $result .= $this->get_url().'<br /><br />';
        $result .= 'Te damos la enhorabuena y te animamos a seguir participando con nuevas iniciativas en ';
        $result .= 'esta plataforma, porque #somosel110.';
        return $result;
    }

}

