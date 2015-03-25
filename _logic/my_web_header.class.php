<?php


class my_web_header extends web_header implements iweb_object {
    public $user = null;
    public function __toString() {
        $result = ''; 
        if ( website::$user->is_logged_in()) {
            $this->user = website::$user;
                    $result = "";
            $result = "<div class=\"header_user_info_name\">";
            
            $avatar = website::$user->get('avatar');
            if ($avatar!='') {
                $img = '<img src="'.website::$base_url.'/get_img_user_min.php?view_mode=thumb&file='.urlencode($avatar).'" alt="" style="float:left; margin-right: 8px; width:40px; height:40px;" />';
            } else {
                $img = '<img src="'.website::$base_url.'/img/noavatar_min.png" alt="" style="float:left; margin-right: 8px; width:40px; height:40px;" />';
            }
            
            $result .= '<a href="'.website::$base_url.'/perfil/editar.php" style="position:relative;">';
            $result .= $img;
            $result .= '</a>';
            
            
            
            $result .= '<span>';
            $result .= "<b>".$this->user->get_full_name(). "</b><br />";
            $result .= $this->user->get_username();
            $gl = $this->user->get_group_names_list();
            if ( $gl != '' ) $result .= " <i>(". $gl .")</i></span><br /><br />";
            
            $result .= '<div style="width: 380px; position:absolute; top: 85px; right: 53px; text-align: right;">';
            
            $result .= '<a href="'.website::$base_url.'/perfil/" class="link_button2">Ir a mi Perfil</a> &nbsp;&nbsp;&nbsp;';    
            $target = new url(website::$base_url."/fw-login.php?command_=logout");
            $result .= '<a href="'.$target->__toString().'" class="link_button2">Cerrar sesión</a> ';
            $result .= '</div>';
            
            
            $result .= '<div style="width: 380px; position:absolute; top:  67px; right: 350px; text-align: right;">';
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
            
            $result .= '<div style="width: 380px; position:absolute; top:75px; right:20px; text-align: right;">';
            $result .= '<a href="'.website::$base_url.'/quienes-somos.php#cofinanciadores" 
                class="network_icon"><img src="'.website::$base_url .'/img/users_icon.png" alt="Quienes somos" /></a>'; 
            $result .= '<a href="https://twitter.com/Escano110_" target="_blank" class="network_icon"><img 
                src="'.website::$base_url.'/img/twitter_icon.png" alt="Twitter" /></a>';
            $result .= '<a href="https://www.facebook.com/escano110" target="_blank" class="network_icon"><img 
                src="'.website::$base_url.'/img/facebook_icon.png" alt="Facebook" /></a>';
                
			$result .= '<a href="'.website::$base_url.'/participa.php" class="top_link" style="margin-left:45px;">Regístrate</a>';
            $result .= '</div>';
        }
        return $result;
    }
    
    
}