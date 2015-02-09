<?php
class item_avotable_miniatura extends item_avotable_base {
    public $data;
    
    /**
     * @var avotable
     */
    public $item = null;   
    
    
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
        
        $result = '';
        $result .= '<a class="avotable '.$tipo_class[$d['tipo']].'" href="'.$target.'">';
        $result .= '<div class="miniatura_imagen">';
        $result .= '<img src="'.$img_url.'" alt="" class="miniatura_foto" />';
        $result .= '</div>';
        $result .= '<img src="'.website::$base_url.'/img/tipos/'.$tipo_class[$d['tipo']].'.png" alt="" class="miniatura_logo" />';
        
        $logro = new logro($d['tipo']);
        $result .= $logro->get_icon($d['votos']);
        //$result .= '<img src="'.website::$base_url.'/img/logros1/bronce_ilp.png" alt="" style="width:55px; height:55px;" class="logro_logo" />';
        
        $result .= '<div class="miniatura_label">';
        
        $result .= $etiqueta[$d['tipo']];
        $result .= '</div>';
        $result .= '<h2><p>'.$d['titulo'].'</p></h2>';
        $result .= '<div class="resumen">';
        $result .= $d['texto_pregunta'].$d['resumen'] .'<br />';
		$result .= '<br /><b>Apoyos hasta ahora: '.$d['votos'].'</b>';
        $result .= '</div>';
        $result .= '</a>';
            
        return $result;
    }
    
    
}