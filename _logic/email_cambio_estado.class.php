<?php

class email_cambio_estado extends email {
    
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
        $this->subject = $this->get_subject();
        $this->to = $user->username;
        parent::send();
        
        $this->to = 'vicenteherrera@vicenteherrera.com';
        parent::send();
        
        $this->to = 'info@escaño110.org';
        parent::send();
        
        $this->to = 'info@agenciaconsentidocomun.com';
        parent::send();
        
    }
    private function get_subject() {
        $pre = '[#'.$this->avotable_data->id.'] ';
        $pre .= ucfirst($this->avotable_data->get_nombre_tipo()).' ';
        switch($this->avotable_data->estado) {
            case avotable::enum_estado_enviada:
                return $pre.'enviada: '.$this->avotable_data->titulo;
            case avotable::enum_estado_cerrada:
                return $pre.'cerrada: '.$this->avotable_data->titulo;
            case avotable::enum_estado_admitida:
                return $pre.'admitida: '.$this->avotable_data->titulo;
            case avotable::enum_estado_exitosa:
                return $pre.'exitosa: '.$this->avotable_data->titulo;
            case avotable::enum_estado_rechazada:
                return $pre.'rechazada: '.$this->avotable_data->titulo;
        }
    }
    private function get_message() {
        switch($this->avotable_data->estado) {
            case avotable::enum_estado_enviada:
                return $this->get_message_enviada();
            case avotable::enum_estado_cerrada:
                return $this->get_message_cerrada();
            case avotable::enum_estado_admitida:
                return $this->get_message_admitida();
            case avotable::enum_estado_exitosa:
                return $this->get_message_exitosa();
            case avotable::enum_estado_rechazada:
                return $this->get_message_rechazada();
        }
    }
    private function get_url() {
        $base = 'propuesta';
        $url =  'http://www.escaño110.org/propuesta.php?id='.$this->avotable_data->id;
        $url = '<a href="'.$url.'">'.$url.'</a>';
        return $url;
    }
    function get_message_registro() {
        $result = 'Para completar tu registro de usuario con estos datos, visita el enlace proporcionado más abajo:<br />'; 
        //$result .= '<ul>';
        //$result .= '<li>Email / usuario: brunopadilla+prueba3@gmail.com</li>';
        //$result .= '<li>Nombre: Bruno</li>';
        //$result .= '<li>Apellidos: Padilla del Valle</li>';
        //$result .= '</ul>';
        //$result .= 'Utiliza este enlace una sola vez para activar tu cuenta:</li>';
        //$result .= 'http://www.escaño110.org/perfil/activate.php?k=21AE931EA8850B6DE19CEAE293C';
        return $result;
    }

    function get_message_enviada() {
        $result = 'Hemos recibido tu iniciativa/pregunta/propuesta en Escaño110:<br />'.
            '<i>'.$this->avotable_data->titulo.'</i><br />';
        $result .= 'En breve volveremos a contactar contigo para confirmar su admisión y publicación en la web.<br /><br />';
        $result .= 'Gracias por participar, recuerda que #somosel110.';
        return $result;
    }

    function get_message_admitida() {
        $url = $this->get_url();
        $result = 'Tu '.$this->avotable_data->get_nombre_tipo().' en Escaño110 ha sido admitida y publicada en la web:<br />'.
            '<i>'.$this->avotable_data->titulo.'</i><br />';
        $result .= $url.'<br /><br />';
        $result .= 'Difúndela entre tus conocidos y obtén firmas/votos/apoyos para conseguir los distintos';
        $result .= 'logros que hemos previsto. Si los alcanzas tendremos más opciones de incluir este tema'; 
        $result .= 'en la agenda política y mediática.<br /><br />';
        $result .= 'Gracias por participar, recuerda que #somosel110.';
        return $result;
    }

    function get_message_rechazada() {
        $result = 'Tu '.$this->avotable_data->get_nombre_tipo().' en Escaño110 ha sido rechazada y no podrá ser'; 
        $result .= 'publicada en la web con esa formulación.<br />'.
            '<i>'.$this->avotable_data->titulo.'</i><br /><br />'.
            'En breve recibirás un email nuestro en el que';
        $result .= 'te detallamos los motivos de su no admisión.';
        $result .= 'Gracias por participar, recuerda que #somosel110.';
        return $result;
    }

    function get_message_exitosa() {
        $result = 'El plazo de admisión de '.$this->avotable_data->get_nombre_apoyos().' para tu '.
            $this->avotable_data->get_nombre_tipo().' en '.
            'Escaño110 se ha cerrado, obteniendo un total de '.$this->avotable_data->votos.' '.
            $this->avotable_data->get_nombre_apoyos().'.<br />'.
            '<i>'.$this->avotable_data->titulo.'</i><br />'.
            $this->get_url().'<br /><br />';

        if ( isset( $this->logro ) && $this->logro->get_nombre_logro()!='' ) {
            $result .= 'Te damos la enhorabuena por el logro '.strtoupper($this->logro->get_nombre_logro());
                ' y te animamos a seguir participando con '.
                'nuevas iniciativas en esta plataforma, porque #somosel110.'; 
        } else {
            $result .= 'Te animamos a seguir participando con nuevas iniciativas en esta plataforma, porque #somosel110.';
        }

        return $result;
    }

    function get_message_cerrada() {
        $result = 'El plazo de admisión de '.$this->avotable_data->get_nombre_apoyos().' para tu '.
            $this->avotable_data->get_nombre_tipo().' en '.
            'Escaño110 se ha cerrado, obteniendo un total de '.$this->avotable_data->votos.' '.
            $this->avotable_data->get_nombre_apoyos().'.<br />'.
            $this->get_url().'<br /><br />';
        $result .= 'Te animamos a seguir participando con nuevas iniciativas en esta plataforma, porque #somosel110.';
        return $result;
    }

}