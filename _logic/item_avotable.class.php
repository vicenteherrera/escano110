<?php
class item_avotable extends item_avotable_base {
    
    public $data;
    
    public function __toString() {
        $d = $this->d();
        
        //Comprobaciones de seguridad

        if ( ! ( $d->estado == 1 || $d->estado == 2 || $d->estado == 3 ) && ! website::$user->is_in_any_group(array('administrador') ) ) {
            $result = 'No tiene permiso para visualizar este elemento.<br /><a href="./iniciativas.php" class="leer_mas">VOLVER AL LISTADO DE INICIATIVAS</a>';
            return $result;
        }
        
        
        $edit_url = array(
            1 => 'propuestas.php',
            2 => 'ilps.php',
            3 => 'preguntas.php');
        $tipo_class = array(
            1 => 'propuesta',
            2 => 'ilp',
            3 => 'pregunta');
        $etiqueta = array(
            1 => 'Propuesta',
            2 => 'Iniciativa Legislativa Parlamentaria',
            3 => 'Pregunta'
        );
        
        $votada = array();
        if ( website::$user->is_logged_in() ) {
            $sql = new sql_str("SELECT fecha FROM votos WHERE id_propuesta='{@0}' AND id_usuario='{@1}'", $d->id, website::$user->get_id() );
            $votada = website::$database->execute_get_row_array($sql);
        }
        $img_url = website::$base_url.'/img/miniatura_generica_full.jpg';
        if ($d->imagen != '' ) {
            $img_url = website::$base_url.'/get_img3.php?file='.rawurlencode($d->imagen).'&view_mode=thumb';
        }
  
        // ----------------------------------------------------
        
        $result = '';
        
        
        $result .= '<div class="'.$tipo_class[$d->tipo].' item_avotable_page">';
        $result .= '<h1>'.$d->titulo.'</h2>';
        
        
        $result .= '<div style="width: 610px; display: inline-block;">';
        $result .= '<div style="width: 600px; height: 300px; background-image:url('.$img_url.'); display: block; background-position-y: center;"> </div>'; //" alt="" style="width: 600px; height: 450px; " /><br />';
        $result .= '<h3>'.$etiqueta[$d->tipo].'</h3>';
        $result .= nl2br($d->descripcion);
        $result .= nl2br($d->texto_pregunta);
        if ( ! empty( $d->id_parlamentario ) ) {
            $p = new parlamentario( $d->id_parlamentario );
            $p->load_recursive();
            
            $result .= '<h3>Parlamentario/a</h3>';
            $result .= '<div style="width: 160px; display:inline-block; text-align:left;">';
            if ( ! empty( $p->foto ) ) {
                $result .= '<img src="'.website::$base_url.'/get_img_parlamentario.php?file='.$p->foto.'&view_mode=thumb" alt="Foto '.$p->nombre.' '.$p->apellidos.'" /><br />';
            }
            $result .= '<!-- id: '.$p->id.' -->';
            $result .= '<b>'.$p->nombre.' '.$p->apellidos.'</b><br />';
            $result .= '<i>'.info::get_provincias_andalucia($p->circinscripcion).'</i><br /><br />';
            
            foreach ($p->_comisiones as $comision) {
                $result .= $comision->nombre."<br />";
            }
            $result .= '</div>';
            if ( ! empty( $d->texto_respuesta ) ) {
                $result .= '<div style="width: 450px; display:inline-block; vertical-align: top;"><div class="bubble">';
                //$result .= '<h3>Respuesta</h3>';
                $result .= nl2br($d->texto_respuesta);
                $result .= '</div></div>';
            }
            $result .= '<br style="clear: both;" />';
  
        }

        $result .= '<br /><br />';
        
        if ($d->url_video) {
            $result .= '<iframe width="600" height="337" src="'.(str_replace("watch?v=","embed/",$d->url_video)).'" frameborder="0" allowfullscreen></iframe>';
        }
        if ($d->url_descripcion) {
            $result .= '<h3><a href="'.rawurlencode($d->url_articulo).'" class="leer_mas" rel="nofollow">Visita la web descriptiva para más información</a></h3>';
        }
        if ($d->url_articulo) {
            $result .= '<h3><a href="'.rawurlencode($d->url_articulo).'" class="leer_mas">Visita el artículo destacado en nuestro blog</a></h3>';
        }
        $result .= '<br style="clear: both;" />';
        $result .= '<a href="./iniciativas.php" class="leer_mas">VOLVER AL LISTADO DE INICIATIVAS</a>';
        
        if ( website::$user->is_in_group('administrador') ) {
            $result .= '<br /><br /><a href="./'.$edit_url[$d->tipo].'?command_=edit&id='.$d->id.'" class="leer_mas">EDITAR</a>';
        }
        $result .= '</div>';
        
        // ----------------------------------------------------
        
        $result .= '<div class="propuesta_side">';
        
        $votos = $d->votos;               
        $logro = new logro($d->tipo);
        //$votos = $logro->get_value();
            
        /*
        if ( $d->tipo <> avotable::enum_tipo_pregunta ) {
            $result .= 'Fecha inicio:<br /><b>'.$d->fecha_admitida.'</b><br /><br />';
            $result .= 'Fecha fin:<br /><b>'.$d->fecha_cerrada.'</b><br /><br />';
        }
        */
        
        
        
        if ( $d->estado == avotable::enum_estado_enviada ) {                 
            $result .= 'Este elemento aún no ha sido revisado para su publicación.<br />';
            
        } else if ( $d->estado == avotable::enum_estado_admitida ) { 
            
            $result .= "<span class=\"numero_votos\">$votos ".$this->get_action_noun(true)."</span><br /><br /><br />";
            
            if ( $d->tipo == avotable::enum_tipo_pregunta ) {
                if ($d->texto_respuesta=='')
                    $result .= "<b>Tiempo sin responder: ".$this->get_days_without_answer()."</b><br /><br />";
            } else {
                $result .= "<b>Quedan ".$this->get_descriptive_time_to_finish()."</b><br /><br />";
            }
            if ( is_array($votada) && count($votada)>0 ) {
                $result .= $this->get_action_verb_past()." este elemento el ".date('d/m/Y',strtotime($votada['fecha']))."<br /><br />";
            } else {
                if ( ! website::$user->is_logged_in() ) {
                    $result .= "<a href=\"".website::$base_url."/participa.php\" class=\"leer_mas\">Regístrate para ".strtolower($this->get_action_phrase())."</a><br /><br />";
                } else {
                    //if ( $d->tipo == avotable::enum_tipo_ilp ) {
                        //$result .= '<input type="button" value="Firmar" onclick="testSign();" />&nbsp;';
                        //$result .= '<span id="resultMessage"> </span>';
                        //$result .= '<input type="text" readonly="readonly" id="result" />';
                        
                    //} else {
                        if ( $d->tipo == avotable::enum_tipo_pregunta ) {
                            //$result .= '¿Apoyas esta pregunta?<br />';
                        }
                        $result .= "<span id=\"procesar_voto\" style=\"display:none; line-height: 34px;\" >Procesando...</span>";
                        $result .= "<a href=\"".website::$base_url."/votar.php?id=".$d->id."\" class=\"leer_mas\" rel=\"nofollow\" id=\"votar_link\" ";
                        $result .= "onclick=\"this.style.display='none';document.getElementById('procesar_voto').style.display='inline';return true;\">";
                        $result .= $this->get_action_phrase();
                        $result .= "</a><br /><br />";
                    //}
                }
            }
            
            if ( $d->tipo <> avotable::enum_tipo_propuesta ) {
                $result .= '
                    <script>
            		$(function() {
            			$(".meter > span").each(function() {
            				$(this)
            					.data("origWidth", $(this).width())
            					.width(0)
            					.animate({
            						width: $(this).data("origWidth")
            					}, 1200);
            			});
                        /*
                        $(".numero_votos").each(function() {
            				$(this)
            					.data("origWidth", $(this).width())
            					.width(0)
            					.animate({
            						width: $(this).data("origWidth")
            					}, 1200);
            			});
                        */
            		});
                    </script>';

            }
            
            // - Logros -----------------------------------
            

            
            $logro->set_value($votos);
            $result .=  "<hr /><br /><div>";
            $result .=  $logro->get_info_progress();
            $result .=  "</div>";
            $votos = $logro->get_value();
            
            
            
        } else if ( $d->estado == avotable::enum_estado_exitosa ) { //Exitosa
            $result .= '¡Éxito alcanzado!<br /><br />';
            $result .= "<span class=\"numero_votos\">$d->votos ".$this->get_action_noun(true)."</span><br />";
            //TODO: Firmas por apoyos
            
        } else if ( $d->estado == avotable::enum_estado_cerrada ) { //Cerrada
            $result .= 'Este elemento está cerrado<br />';
            $result .= "<span class=\"numero_votos\">$d->votos ".$this->get_action_noun(true)."</span><br />";
            
        } else if ( $d->estado == avotable::enum_estado_rechazada ) { //Rechazada
            $result .= 'Este elemento no ha sido aceptado para su publicación.<br />';
        }
        

        $result .= '</div>';
        
        $result .= '</div>';
        
        return $result;
    }
}

    
