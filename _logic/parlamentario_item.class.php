<?php


class parlamentario_item extends aitem {
    
    /** @return parlamentario
     */
    public function d() { return parent::d(); }
    
    public $show_link = false;
    public function set_show_link($show_link=true) {
        $this->show_link = $show_link;
    }
    public function __toString() {
        $d = new parlamentario();
        $d->set_data( $this->get_data());
        $d->load_recursive();
        
        $result = '';
        
        if ($this->show_link) {
            $result .= '<a class="parlamentario" href="./nueva_pregunta.php/'.$d->id.'" >';
        } else {
            $result .= '<div class="parlamentario">';
        }
        if ( ! empty( $d->foto ) ) {
            $result .= '<img src="'.website::$base_url.'/get_img_parlamentario.php?file='.$d->foto.'&view_mode=thumb" alt="Foto '.$d->nombre.' '.$d->apellidos.'" style="width:88px; height: 132px; float:left;"/>';
        }
        $result .= '<span class="parlamentario_inner">';
        $result .= '<span class="parlmaentario_nombre">'.$d->nombre.' '.$d->apellidos.'</span><br />';
        $result .= '<span class="provincia">'.info::get_provincias_andalucia($d->circinscripcion).'</span>';

        $result .= '<ul>';
        foreach ($d->_comisiones as $comision) {
            $result .= '<li>'.$comision->nombre."</li>";
        }
        $result .= '</ul>';
        $result .= '</span>';
        $partido = parlamentarios::$grupos_parlamentarios_array[ $d->grupo_parlamentario ];
        if ( $d->grupo_parlamentario > 0 ) {
            $result .= '<img src="'.website::$base_url.'/img/partidos/'.$d->grupo_parlamentario.'.jpg" alt="'.$partido.'" class="partido_img"/><br />';
        }
        if ($this->show_link) {
            $result .= '</a>';
        } else {
            $result .= '</div>';
        }
        return $result;
    }
    
}