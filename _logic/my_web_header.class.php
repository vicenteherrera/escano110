<?php


class my_web_header extends web_header implements iweb_object {
    public $user = null;
    public function __toString() {
        $result = ''; 
        if ( website::$user->is_logged_in()) {
            $this->user = website::$user;
                    $result = "";
            $result = "<div class=\"header_user_info_name\">";
            $result .= '<span>';
            $result .= "<b>".$this->user->get_full_name(). "</b><br />";
            $result .= $this->user->get_username();
            $gl = $this->user->get_group_names_list();
            if ( $gl != '' ) $result .= " <i>(". $gl .")</i></span><br /><br />";
            //$result .= $this->user->get('id_empresa')."<br />";
            $result .= '<a href="'.website::$base_url.'/perfil/" class="link_button2">Ir a mi Perfil</a> ';
            $target = new url(website::$base_url."/fw-login.php?command_=logout");
            $result .= '<a href="'.$target->__toString().'" class="link_button2">Cerrar sesión</a> ';
            
            $result .= "</div>";
        
        } else {
            $result = '<a href="'.website::$base_url.'/inicia-sesion.php" class="top_link">Inicia sesión</a>';
			$result .= '<a href="'.website::$base_url.'/participa.php" class="top_link">Regístrate</a>';
            
        }
        return $result;
    }
    
    
}