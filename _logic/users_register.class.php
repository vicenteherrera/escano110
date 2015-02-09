<?php

class users_register extends table_data {
    
    public $table_name = 'fw_users';
    public $table_title = 'Usuarios';
    public $record_title = 'Usuario';
    
    public $email_activation_from = '"Escaño110" <info@escaño110.org>';
    
    public function init_config() {
        if ($this->initialised) return;
        $this->autocomplete = false;
        $this->columns = array(
            'id',
            'username',
            'name',
            'surname', 
            'password',
            'password2',
            'group',
            'activation',
            'verified'
        );
         $this->columns_title = array(
            'id'=>'id',
            'username'=>'Correo electrónico / Usuario',
            'name'=>'Nombre',
            'surname'=>'Apellidos',
            'password'=>'Contraseña',
            'password2'=>'Repita contraseña',
            'group'=>'Grupo'
        );       
        $this->columns_format['username'] = 'email';
        $this->columns_format['password'] = 'password';
        $this->columns_format['password2'] = 'password';
        $this->columns_required_all = true;
        $this->send_button_mesage = 'Crear usuario';
        $this->save_continue_url = website::$base_url.'/';
        $this->save_message = 'Se ha enviado un mensaje de correo electrónico para verificar su cuenta de usuario.<br />
                               Compruebe su buzón de entrada y siga las instrucciones del mensaje que recibirá en pocos minutos.<br />
                               <br />
                               En caso de no recibirlo, revise la carpeta de spam de su cliente de correo.';
        //------------------------------------------------------
        $this->key_set = new key_set(array('id'));
        
        $this->default_command = 'new';
        
        parent::init_config();
        
        unset($this->commands['table']);
        unset($this->commands['delete']);
        
        $this->get('username')->add_validation_rule(new validation_unique());
        $this->get('id')->set_visible(false);
        $this->get('group')->set_forced_value('usuario')->set_visible(false);
        $this->get('password')->add_validation_rule(new validation_min_length(8));
        $this->get('password2')->add_validation_rule(new validation_match($this->get('password')));
        $this->get('activation')->set_visible(false)->set_forced_value( $this->get_activation_key() );
        $this->get('verified')->set_visible(false)->set_forced_value(0);
        //------------------------------------------------------
        $this->control_group = new control_edit($this);
        $this->control_group->add(
             'id',
            'username',
            'name',
            'surname', 
            'password',
            'password2',
            new control_literal('<br />El registro implica la aceptación de la <a href="../politica-de-privacidad">política de privacidad</a>.<br /><br />')
        );
    }
    
    protected $activation = '';
    
    protected function get_activation_key() {
        if ( $this->activation == '' ) {
            $this->activation = strtoupper(md5(uniqid(rand(),true)));
        }
        return $this->activation;
    }

    function after_command() {

        if ( ! ( $this->command_name == 'insert' && $this->command_ok ) ) {
            return;
        }
        $email = $this->get('username')->get_value();
        $nombre = $this->get('name')->get_value();
        $apellidos = $this->get('surname')->get_value();
        $key_act = $this->get_activation_key();
        
        $default_web_page_title = 'Escaño 110';
        $base_url = 'http://www.escaño110.org';
        $url_act = $base_url.'/perfil/activate.php?k='.$key_act;
        $enlace = '<a style="padding: 3px 6px; border-radius: 4px; color:#fff; background-color:#6E6473; text-decoration:none;" href="'.$url_act.'">'.
            $url_act.'</a>';
        
		$message  = '<div style="background-color: #CECFCF; padding: 10px 20px; width: 100%; color: #6E6473;">';
          $message .= '<div style="background-color: #F7F3F0; padding: 7px 20px 5px 20px; width: 650px; margin: 0 auto;">';
            $message .= '<h1><img src="'.$base_url.'/img/logo.png" alt="Escaño 110"></h1>'; //'.$default_web_page_title.'</h1>';
          $message .= '</div>';
        $message .= '<div style="background-color: #FFFFFF; padding: 20px 20px; width: 650px; margin: 0 auto;">';
          $message .= '<i>Este es un mensaje de aviso automático del portal <a href="http://'.$base_url.'">'.$base_url.'</a></i><br /><br /><br />';
          $message .= '<br />
                        Para completar tu registro de usuario con estos datos, visite el enlace proporcionado más abajo:<br /><br />
                        <ul><li>Email / usuario: '.$email.'</li>
                            <li>Nombre: '.$nombre.'</li>
                            <li>Apellidos: '.$apellidos.'</li>
                        </ul>
                        <br />
                          <div>
  		                    Utiliza este enlace una sola vez para activar tu cuenta:<br /><br />'.$enlace.'<br /><br />
                            .
                         </div>
                		</div>
                    </div>';
        
        $this->send_email($this->email_activation_from,$email, 'Activación cuenta de usuario', $message);
        
        $monitor = "vicenteherrera@vicenteherrera.com";
        $this->send_email($this->email_activation_from,$monitor,'Activación cuenta de usuario',$message);
    }
    function send_email($from, $to, $subject, $message_html) {
        //specify the email address you are sending to, and the email subject
        $email = $to;
        				
        //create a boundary for the email. This 
        $boundary = uniqid('np');
        				
        //headers - specify your from email address and name here
        //and specify the boundary for the email
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "From: $from \r\n";
        $headers .= "To: ".$email."\r\n";
        //'Reply-To: ' . $from,
        //'Return-Path: ' . $from,
        $headers .= 'Date: ' . date('r', $_SERVER['REQUEST_TIME'])."\r\n";
        $headers .= 'Message-ID: <' . $_SERVER['REQUEST_TIME'] . md5($_SERVER['REQUEST_TIME'].$subject) . '@' . $_SERVER['SERVER_NAME'] . '>'."\r\n";
        $headers .= 'X-Mailer: PHP v' . phpversion()."\r\n";
        $headers .= 'X-Originating-IP: ' . $_SERVER['SERVER_ADDR']."\r\n";
        
        $headers .= "Content-Type: multipart/alternative;boundary=" . $boundary . "\r\n";
        
        //here is the content body
        $message = "This is a MIME encoded message.";
        
        //Plain text body
        $message .= "\r\n\r\n--" . $boundary . "\r\n";
        $message .= "Content-type: text/plain;charset=iso-8859-1\r\n\r\n";
        $message .= strip_tags(str_replace("<br />","\r\n",str_replace("<br>","\r\n",str_replace("</h2>","\r\n\r\n",str_replace("</td><td>"," : ",$message_html)))));
        
        //Html body
        $message .= "\r\n\r\n--" . $boundary . "\r\n";
        $message .= "Content-type: text/html;charset=uiso-8859-1\r\n\r\n";
        $message .= $message_html;
        
        $message .= "\r\n\r\n--" . $boundary . "--";
        
        
        error_log("mail to:$to from:$from subject:$subject\r\n");
		if ( website::in_developer_mode() ) {
			echo "mail to:$to from:$from subject:$subject<br /><br />";
			echo $message_html."<br /><br />";
			
			return;
		}
        
        //invoke the PHP mail function
        mail('', $subject, $message, $headers);


    
    }
}