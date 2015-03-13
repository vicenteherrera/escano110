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
            
            $result .= '<div style="width: 380px; position:absolute; top: 75px; right: 72px;text-align: right;">';
            
            $result .= '<a href="'.website::$base_url.'/perfil/" class="link_button2">Ir a mi Perfil</a> ';    
            $target = new url(website::$base_url."/fw-login.php?command_=logout");
            $result .= '<a href="'.$target->__toString().'" class="link_button2">Cerrar sesión</a> ';
            $result .= '</div>';
            
            
            $result .= '<div style="width: 380px; position:absolute; top: 57px; right: 250px; text-align: right;">';
            $result .= '<a href="'.website::$base_url.'/quienes-somos.php#cofinanciadores" 
                class="network_icon"><img src="'.website::$base_url .'/img/users_icon.png" alt="Quienes somos" /></a>'; 
            $result .= '<a href="https://twitter.com/Escano110_" target="_blank" class="network_icon"><img 
                src="'.website::$base_url.'/img/twitter_icon.png" alt="Twitter" /></a>';
            $result .= '<a href="https://www.facebook.com/escano110" target="_blank" class="network_icon"><img 
                src="'.website::$base_url.'/img/facebook_icon.png" alt="Facebook" /></a>';
            $result .= '</div>';
            
            
        
            $result .= '</div>';
        } else {
            $result .= '<div style="width: 380px; position:absolute; top:10px; right:20px; text-align: right;">';
            $result .= '<a href="'.website::$base_url.'/inicia-sesion.php" class="top_link">Inicia sesión</a>';
            $result .= '</div>';
            
            $result .= '<div style="width: 380px; position:absolute; top:60px; right:20px; text-align: right;">';
            $result .= '<a href="'.website::$base_url.'/quienes-somos.php#cofinanciadores" 
                class="network_icon"><img src="'.website::$base_url .'/img/users_icon.png" alt="Quienes somos" /></a>'; 
            $result .= '<a href="https://twitter.com/Escano110_" target="_blank" class="network_icon"><img 
                src="'.website::$base_url.'/img/twitter_icon.png" alt="Twitter" /></a>';
            $result .= '<a href="https://www.facebook.com/escano110" target="_blank" class="network_icon"><img 
                src="'.website::$base_url.'/img/facebook_icon.png" alt="Facebook" /></a>';
                
			$result .= '<a href="'.website::$base_url.'/participa.php" class="top_link">Regístrate</a>';
            $result .= '</div>';
        }
        return $result;
    }
    
    
}