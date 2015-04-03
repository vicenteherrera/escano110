<?php

class item_promotor {
    public $id_usuario;
    protected $usuario;
    public function __construct($id_usuario) {
        $this->id_usuario = $id_usuario;
    }
    function __toString() {
        if ( $this->usuario == null ) 
            $usuario = new usuario($this->id_usuario);
        $usuario->load();
        
        $avatar = $usuario->avatar;
        if ( $avatar != '' ) {
            $img = website::$base_url.'/get_img_user_min.php?view_mode=thumb&file='.urlencode($avatar);
        } else {
            $img = website::$base_url.'/img/noavatar_min.png';
        }
        $img = '<img src="'.$img.'" alt="'.$usuario->get_full_name().'" />';
        
        $result = '';
        $result .= '<a href="'.website::$base_url.'/promotor.php?id='.$this->id_usuario.'" class="a_promotor" style="">';
        $result .= $img;
        $result .= '<span class="title_promotor">Promotor/a</span><br />';  
        $result .= $usuario->get_full_name();
        $result .= '</a>';
            
        return $result;
    }
}