<?php

class logro {
	const oro = 1;
	const plata = 2;
	const bronce = 3;
	/**
	 * @var int
	 */
	public $min_oro = 0;
	public $min_plata = 0;
	public $min_bronce = 0;
	
	public $tipo_avotable = null;
	
	public $value = 0;
	
    private $demo_mode = false;
    
    public $oro = false;
    public $plata = false;
    public $bronce = false;
    
	public function __construct($tipo) {
		$this->tipo = $tipo;
		
		switch($this->tipo) {
			case avotable::enum_tipo_propuesta:
				$this->min_bronce = 50;
				$this->min_plata = 110;
				$this->min_oro = 500;
			break;
			case avotable::enum_tipo_ilp:
				$this->min_bronce = 500;
				$this->min_plata = 2000;
				$this->min_oro = 5000;
			break;
			case avotable::enum_tipo_pregunta:
				$this->min_bronce = 10;
				$this->min_plata = 25;
				$this->min_oro = 50;
			break;
            default;
                throw new ExceptionDeveloper();
		}
	}
    public function set_value($value) {
        $this->value = $value;
    }
    public function get_value() {
        return $this->value;
    }
    public function get_info_progress() {
        $result = '';
        $bronce = false;
        $plata = false;
        $oro = false;
        
        if ( $this->demo_mode ) {
            $this->value = rand(1, $this->min_plata)*2;
        } 
        $level = round(($this->value / $this->min_bronce) * 100);
        
        if ( $this->value < $this->min_bronce ) {
            $level = round(($this->value / $this->min_bronce) * 100);
            
            $result .= '<span>Alcanzados '.$this->value.'</span>';
            $result .= $this->get_meter($level);
            $result .= '<span style="text-align: right; display:block;">Faltan '.($this->min_bronce-$this->value).' para BRONCE</span>';
        } else {
            $bronce = true;
            $result .= 'LOGRO BRONCE conseguido<br /><br />';
            if ($this->value < $this->min_plata ) {
                $level = round(($this->value / $this->min_plata) * 100);
                
                $result .= '<span>Alcanzados '.$this->value.'</span>';
                $result .= $this->get_meter($level);
                $result .= '<span style="text-align: right; display:block;">Faltan '.($this->min_plata-$this->value).' para PLATA</span>';
            } else {
                $plata = true;
                $result .= 'LOGRO PLATA conseguido<br /><br />';
                if ($this->value < $this->min_oro ) {
                    $level = round(($this->value / $this->min_oro) * 100);
                    
                    $result .= '<span>Alcanzados '.$this->value.'</span>';
                    $result .= $this->get_meter($level);
                    $result .= '<span style="text-align: right; display:block;">Faltan '.($this->min_oro-$this->value).' para ORO</span>';
                } else {
                    $oro = true;
                    $result .= 'LOGRO ORO conseguido<br /><br />';
                }
            }
        }
        $result .= "<br />". $this->get_imgs_logros($oro, $plata, $bronce);
        return $result;
    }
    public function get_imgs_logros($oro, $plata, $bronce) {
        $result = '';
        $tipo = array(
            avotable::enum_tipo_ilp => 'ilp',
            avotable::enum_tipo_pregunta => 'pregunta',
            avotable::enum_tipo_propuesta => 'propuesta',
        );
        $img = $tipo[$this->tipo];
        if ($bronce) {
            $result .= '<img src="'.website::$base_url.'/img/logros1/'.$img.'_bronce.png" alt="" style="width:75px; height: 75px; margin: 0 1px;" />';
        } else {
            $result .= '<img src="'.website::$base_url.'/img/logros1/'.$img.'_bronce.png" alt="" style="width:75px; height: 75px; margin: 0 1px; opacity: 0.3;" />';
        }
        if ($plata) {
            $result .= '<img src="'.website::$base_url.'/img/logros1/'.$img.'_plata.png" alt="" style="width:75px; height: 75px; margin: 0 1px;" />';
        } else {
            $result .= '<img src="'.website::$base_url.'/img/logros1/'.$img.'_plata.png" alt="" style="width:75px; height: 75px; margin: 0 1px; opacity: 0.3;" />';
        }
        if ($oro) {
            $result .= '<img src="'.website::$base_url.'/img/logros1/'.$img.'_oro.png" alt="" style="width:75px; height: 75px; margin: 0 1px;" />';
        } else {
            $result .= '<img src="'.website::$base_url.'/img/logros1/'.$img.'_oro.png" alt="" style="width:75px; height: 75px; margin: 0 1px; opacity: 0.3;" />';
        }
        return $result;
        
    }
    function get_meter($level) {
        return '<div class="meter nostripes"><span style="width: '.$level.'%"></span></div>';
    }
    public function evaluate_progress($votos) {
        $this->bronce = false;
        $this->plata = false;
        $this->oro = false;
        //$votos
        $this->value = rand(1, $this->min_plata)*2;  /* ALEATORIO; QUITAR EN PRODUCCIÓN */
        
        if ( $this->value < $this->min_bronce ) {
        } else {
            $this->bronce = true;
            if ($this->value < $this->min_plata ) {
            } else {
                $this->plata = true;
                if ($this->value < $this->min_oro ) {
                } else {
                    $this->oro = true;
                }
            }
        }
    }
    function get_nombre_logro() {
        if ( $this->oro ) return 'oro';
        if ( $this->plata ) return 'plata';
        if ( $this->bronce ) return 'bronce';
        return '';
    }
    function get_icon($votos) {
        $this->evaluate_progress($votos);
        $result = '';
        $tipo = array(
            avotable::enum_tipo_ilp => 'ilp',
            avotable::enum_tipo_pregunta => 'pregunta',
            avotable::enum_tipo_propuesta => 'propuesta',
        );
        $img = $tipo[$this->tipo];
        $base = "";
        if ( $this->oro) $base = 'oro';
        else if ( $this->plata ) $base = 'plata';
        else if ( $this->bronce ) $base = 'bronce';
        if ( $base != '' ) 
            $result .= '<img src="'.website::$base_url.'/img/logros1/'.$base.'_'.$img.'.png" alt="" class="logro_logo" />';
        
        return $result;
    }
}