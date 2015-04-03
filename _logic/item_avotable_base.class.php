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
    public function get_days_without_answer() {
        if ( $this->d()->fecha_admitida == '0000-00-00 00:00:00' ) return '';
        $date1 = new DateTime($this->d()->fecha_admitida);
        $date2 = new DateTime(Date('Y-m-d H:i:s'));
        $interval = $date1->diff($date2);
        //echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 
        $h = $interval->format("%h");
        $a = $interval->format("%a");
        if ( $h < 0 ) {
            return '';
        }
        if ( $a <= 1 ) {
            return "1 día";
        }
        if ($h >= 24 || $a >= 1 ) {
            return $a." días";
        }
        return "<span class=\"recien_fin\">".$h." h : ".$interval->format("%I m")."</span>"; // : %s s");
    }
    public function get_days_since_answer() {
        $date1 = new DateTime(Date('Y-m-d H:i:s'));
        $date2 = new DateTime($this->d()->fecha_cerrada);
        $interval = $date1->diff($date2);
        //echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 
        $h = $interval->format("%h");
        $a = $interval->format("%a");
        if ( $h <= 0 ) {
            return '';
        }
        if ( $a <= 1 ) {
            return "1 día";
        }
        if ($h >= 24 || $a >= 1 ) {
            return $a." días";
        }
        return "<span class=\"recien_fin\">".$h." h : ".$interval->format("%I m")."</span>"; // : %s s");
    }
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
        if ($h <= 24 || $a <= 1 ) {
            return "1 día";
        }
        if ($h >= 24 || $a >= 1 ) {
            return $a." días";
        }
        
        return "<span class=\"recien_fin\">".$h." h : ".$interval->format("%I m")."</span>"; // : %s s");
        
    }
    public function get_fecha_cerrada() {
        if ($this->d()->fecha_cerrada == '0000-00-00 00:00:00' || $this->d()->fecha_cerrada == '' )
            return '';
        
        return date('d/m/Y', strtotime($this->d()->fecha_cerrada));
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
    public function get_action_phrase($lowercase=false) {
        $acciones = array(
            avotable::enum_tipo_propuesta => 'Votar esta propuesta',
            avotable::enum_tipo_ilp => 'Firmar esta iniciativa',
            avotable::enum_tipo_pregunta => 'Apoyar esta pregunta'
        );
        $result = $acciones[$this->data["tipo"]];
        if ( $lowercase ) $result = strtolower($result);
        return $result;
    }
    public function get_action_verb_past($lowercase=false) {
        $acciones = array(
            avotable::enum_tipo_propuesta => 'Votaste',
            avotable::enum_tipo_ilp => 'Firmaste',
            avotable::enum_tipo_pregunta => 'Apoyaste'
        );
        $result = $acciones[$this->data["tipo"]];
        if ( $lowercase ) $result = strtolower($result);
        return $result;
    }
    public function get_action_noun($lowercase=false) {
        $nombres = array(
            avotable::enum_tipo_propuesta => 'Votos',
            avotable::enum_tipo_ilp => 'Firmas',
            avotable::enum_tipo_pregunta => 'Apoyos'
        );
        $result = $nombres[$this->data["tipo"]];
        if ( $lowercase ) $result = strtolower($result);
        return $result;
    }
}