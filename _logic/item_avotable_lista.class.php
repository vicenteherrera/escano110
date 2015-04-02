<?php
class item_avotable_lista extends item_avotable_base {
    public $data;
    
    /**
     * @var avotable
     */
    public $item = null;   
    
    public static $my_items = false;
    
    /*
    const enum_tipo_propuesta = 1;
    const enum_tipo_ilp = 2;
    const enum_tipo_pregunta = 3;
    */
    
    public function __toString() {
        $d = $this->data;
        
        $tipo_class = array(
            1 => 'propuesta',
            2 => 'ilp',
            3 => 'pregunta');
        $etiqueta = array(
            1 => 'Propuesta',
            2 => 'ILP',
            3 => 'Pregunta'
        );
        $img_url = website::$base_url.'/img/miniatura_generica.png';
        if ($d['imagen'] != '' ) {
            $img_url = website::$base_url.'/get_img2.php?file='.rawurlencode($d['imagen']).'&view_mode=thumb';
        }
        $target = website::$base_url.'/ver.php?id='.$d['id'];
        
        $result = '<div class="item_avotable_lista">';
        $result .= '<a class="avotable '.$tipo_class[$d['tipo']].'"  href="'.$target.'" style="width:210px; height:157px; float: left; clear: left; margin-right: 15px;">';
        
		$result .= '<div class="miniatura_imagen" style="width:210px; height:157px;" >';
        $result .= '<img src="'.$img_url.'" alt="" class="miniatura_foto" style="width:210px; height:157px;" />';
        $result .= '</div>';
        
		$result .= '<img src="'.website::$base_url.'/img/tipos/'.$tipo_class[$d['tipo']].'.png" alt="" class="miniatura_logo" />';
        if ( $d['tipo'] == avotable::enum_tipo_pregunta ) {
            if ( $d['texto_respuesta'] != '' ) {
                $img_resp = 'respondida.png';
            } else {
                $img_resp = 'no_respondida.png';
            }
            $result .= '<img src="'.website::$base_url.'/img/'.$img_resp.'" 
                style="right: 120px; top: 5px;"
                alt="" class="miniatura_logo" />';
        }
        
        $logro = new logro($d['tipo']);
        //$result .= $logro->get_icon($d['votos']);
        
        //$result .= '<img src="'.website::$base_url.'/img/logros1/bronce_ilp.png" alt="" style="width:55px; height:55px;" class="logro_logo" />';
        
		$result .= '<div class="miniatura_label">';
        $result .= $etiqueta[$d['tipo']];
        $result .= '</div>';
		
        $result .= '</a>';
		
		$result .= '<h2 class="'.$tipo_class[$d['tipo']].'">'.$d['titulo'].$logro->get_icon($d['votos']).'</h2>';
        $result .= '<div class="resumen_lista">';
        $result .= '<div class="descripcion_lista">';
        
        $result .= $d['texto_pregunta'].$d['resumen'] .'</div>';
        
        $result .= '<div class="acciones_lista" style="width:200px; display:inline-block; vertical-align:top;">';
        if ( $d['tipo'] == avotable::enum_tipo_pregunta ) {
            if ($d['texto_respuesta'] == '' ) {
                $result .= 'Tiempo sin responder: '.$this->get_days_without_answer(). "<br />";
            }
        } else {
            $result .= 'Finalización: '.$this->get_descriptive_time_to_finish(). "<br />";
        }
		$result .= '<br /><b>'.$this->get_action_noun().' hasta ahora: '.$d['votos'].'</b><br />';
        if ( self::$my_items ) {
            $result .= '<a href="'.$target.'" class="leer_mas">Ver</a>';
        } else {
            $result .= '<a href="'.$target.'" class="leer_mas">Leer más y '.$this->get_action_verb(true).'</a>';
        }
        $result .= '</div>';
        
        
        $result .= '<div class="acciones_lista" style="width:300px; display:inline-block; vertical-align:top;">';
        
        if ( self::$my_items ) {
            
            $result .= 'Estado: '.avotable::get_estado_text($d['estado']);
        } else {
                
            $usuario = new usuario($d['id_usuario']);
            $usuario->load();
            
            $avatar = $usuario->avatar;
            if ($avatar!='') {
                $img = website::$base_url.'/get_img_user_min.php?view_mode=thumb&file='.urlencode($avatar);
            } else {
                $img = website::$base_url.'/img/noavatar_min.png';
            }
            $img = '<img src="'.$img.'" alt="" style="float:left; margin: 8px 8px 0 0; width:40px; height:40px; vertical-align: middle;" />';
            $result .= 'Promotor/a:<br />';  
            $result .= '<a href="'.website::$base_url.'/promotor.php?id='.$d['id_usuario'].'" style="line-height: 50px;">';
            $result .= $img;
            $result .= $usuario->get_full_name();
            $result .= '</a>';
        }
        
        $result .= '</div>';
        
        
        
		$result .= '</div>';
        
		$result .= '</div><br style="clear:both;" />';
        
            
        return $result;
    }
    
    
}