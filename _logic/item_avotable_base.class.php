<?php
abstract class item_avotable_base extends aitem {

    /*
    const enum_tipo_propuesta = 1;
    const enum_tipo_ilp = 2;
    const enum_tipo_pregunta = 3;
    */
    
    /** @return avotable_data
     */
    public function d() { return parent::d(); }
    
    public function get_descriptive_time_to_finish() {

        $date1 = new DateTime($this->d()->fecha_cerrada);
        $date2 = new DateTime(Date('Y-m-d H:i:s'));
        $interval = $date1->diff($date2);
        //echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 
        $h = $interval->format("%h");
        $a = $interval->format("%a");
        if ( $h < 0 ) {
            return 'Ya ha finalizado'.$h;
        }
        if ($h >= 24 || $a >= 1 ) {
            return $a." días";
        }
        
        return "<span class=\"recien_fin\">".$h." h : ".$interval->format("%I m")."</span>"; // : %s s");
        
    }
    public function get_action_verb($lowercase=false) {
        $acciones = array(
            avotable::enum_tipo_propuesta => 'Apoyar',
            avotable::enum_tipo_ilp => 'Firmar',
            avotable::enum_tipo_pregunta => 'Votar'
        );
        $result = $acciones[$this->data["tipo"]];
        if ( $lowercase ) $result = strtolower($result);
        return $result;
    }
    public function get_action_verb_past($lowercase=false) {
        $acciones = array(
            avotable::enum_tipo_propuesta => 'Apoyaste',
            avotable::enum_tipo_ilp => 'Firmaste',
            avotable::enum_tipo_pregunta => 'Votaste'
        );
        $result = $acciones[$this->data["tipo"]];
        if ( $lowercase ) $result = strtolower($result);
        return $result;
    }
    public function get_action_noun($lowercase=false) {
        $nombres = array(
            avotable::enum_tipo_propuesta => 'Apoyos',
            avotable::enum_tipo_ilp => 'Firmas',
            avotable::enum_tipo_pregunta => 'Votos'
        );
        $result = $nombres[$this->data["tipo"]];
        if ( $lowercase ) $result = strtolower($result);
        return $result;
    }
}