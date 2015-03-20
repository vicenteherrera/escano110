<?php
require 'config.inc.php';

//Procesamos el envío de emails por logros
function process_emails_logros($tipo_logro, $nivel_logro, $tipo_iniciativa) {
    
    $sql_update = "UPDATE avotable set {#0} = '1' WHERE id = '{@1}'";
    
    $sql = "SELECT `avotable`.`id` as id_avotable, fw_users.`username` as username FROM avotable ".
        "INNER JOIN fw_users ON avotable.`id_usuario`= fw_users.id ".
        "WHERE votos >= '{@0}' and {#1} = '0' and avotable.tipo = '{@2}'";
    $sql_str = new sql_str($sql, $nivel_logro,$tipo_logro,$tipo_iniciativa);
    $avotables = website::$database->execute_get_array( $sql_str );
    
    foreach($avotables as $avotable) {
        echo '['.$avotable['id_avotable'].'] '.$tipo_logro.", nivel_logro=".$nivel_logro.", tipo_iniciativa=".$tipo_iniciativa."<br />";
        $avotable_data = new avotable_data($avotable['id_avotable']);
        $avotable_data->load();
        $logro = new logro( $avotable_data->tipo );
        $logro->set_value( $avotable_data->votos );
        
        $logro->min_oro = 3;
        $logro->min_plata = 2;
        $logro->min_bronce = 1;
        
        $email = new email_logro();
        $email->set_avotable_data( $avotable_data );
        $email->set_logro( $logro );
        
        $sql_str_update = new sql_str($sql_update,$tipo_logro,$avotable_data->id);
        $ok = website::$database->execute_nonquery($sql_str_update);
        if ($ok) $email->send();
        
    }
}
function process_exitos($tipo_iniciativa) {

    $sql_update = "UPDATE avotable set estado = '{@0}' WHERE id = '{@1}'";    
        
    $sql = "SELECT `avotable`.`id` as id_avotable, fw_users.`username` as username FROM avotable ".
        "INNER JOIN fw_users ON avotable.`id_usuario`= fw_users.id ".
        "WHERE avotable.tipo = '{@0}' AND fecha_cerrada <= DATE(NOW()) AND estado='{@1}'";
    $sql_str = new sql_str($sql, $tipo_iniciativa, avotable::enum_estado_admitida);
    $avotables = website::$database->execute_get_array( $sql_str );
    
    foreach($avotables as $avotable) {
        echo '['.$avotable['id_avotable'].'] <br />';
        $avotable_data = new avotable_data($avotable['id_avotable']);
        $avotable_data->load();
        $logro = new logro( $avotable_data->tipo );
        $logro->set_value( $avotable_data->votos );

        $logro->min_oro = 3;
        $logro->min_plata = 2;
        $logro->min_bronce = 1;

        $logro->evaluate_progress($avotable_data->votos);        
        if ( $logro->bronce ) $nuevo_estado = avotable::enum_estado_exitosa;
        else $nuevo_estado = avotable::enum_estado_cerrada;
        
        $sql_str_update = new sql_str($sql_update, $nuevo_estado, $avotable_data->id);
        $ok = website::$database->execute_nonquery($sql_str_update);        
    }
}

process_emails_logros( 'comunicado_bronce', 1, avotable::enum_tipo_ilp);
process_emails_logros( 'comunicado_plata',  2, avotable::enum_tipo_ilp);
process_emails_logros( 'comunicado_oro',    3, avotable::enum_tipo_ilp);

process_emails_logros( 'comunicado_bronce', 1, avotable::enum_tipo_pregunta);
process_emails_logros( 'comunicado_plata',  2, avotable::enum_tipo_pregunta);
process_emails_logros( 'comunicado_oro',    3, avotable::enum_tipo_pregunta);

process_emails_logros( 'comunicado_bronce', 1, avotable::enum_tipo_propuesta);
process_emails_logros( 'comunicado_plata',  2, avotable::enum_tipo_propuesta);
process_emails_logros( 'comunicado_oro',    3, avotable::enum_tipo_propuesta);

process_exitos(avotable::enum_tipo_ilp);
process_exitos(avotable::enum_tipo_propuesta);
