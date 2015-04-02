<?php

require_once('config.inc.php');

//Establecimiento del menú
//website::$current_page->menu = new menu_main();

website::$current_page->add_js_file( website::$base_url.'/MiniApplet_v1_2/miniapplet.js' );
website::$current_page->add_js_file( website::$base_url.'/MiniApplet_v1_2/helper.js' );

/*
<script type="text/javascript" src="http://www.java.com/js/deployJava.js"></script>
<script type="text/javascript" src="https://ws024.juntadeandalucia.es/clienteafirma/miniapplet11_4/miniapplet.js"></script>
<script type="text/javascript">
MiniApplet.cargarMiniApplet(“https://ws024.juntadeandalucia.es/clienteafirma/miniapplet11_4/”);

var params = "format=XAdES Detached\nmode=implicit";
function firmaExito(signatureB64){
    MiniApplet.saveDataToFile(signatureB64, "Guardar firma", null, null, null);
}
function firmaError(errorType, errorMessage) {
    alert("Type: " + errorType + "\nMessage: " + errorMessage);
}
//Firma
MiniApplet.sign(data, “SHA1withRSA”, “XADES”, params, firmaExito, firmaError);

// Cofirma
MiniApplet.coSign(signature, data, “SHA1withRSA”, “XADES”, params, firmaExito, firmaError);

// Contrafirma
MiniApplet.counterSign(signature, “SHA1withRSA”, “XADES”, params, firmaExito, firmaError);
</script>
*/

//Carga del layout
website::load_layout('layout.inc.php');

//Comprobación de usuario
//require "check_user.inc.php";
//===========================================================================================

  $propuesta = website::$database->execute_get_row_array(new sql_str("SELECT * FROM avotable WHERE id='{@0}'",$_GET['id']));
  if ( count($propuesta) == 0 ) {
    echo 'Parámetros por URL incorrectos.<br /><a href="./" class="leer_mas">VOLVER AL LISTADO</a>';
    return;
  }
  
  ?>
  
  <script type="text/javascript">
    // URL del miniapplet (ubicación de miniapplet-full.jar, miniapplet.js)
    var urlmapplet = 'http://wwww.escaño110.org/MiniApplet_v1_2';
    // URL del servlet StorageService
    var storageService = urlmapplet + '/sign/StorageService';
    // URL del servlet RetrieveService
    var retrieveService = urlmapplet+'/sign/RetrieveService';
    MiniApplet.cargarMiniApplet(urlmapplet);
    //MiniApplet.setServlets(storageService, retrieveService); // Configura servlets
    
    function saveSignatureFunction (signature) {
        // Guardamos la firma en un campo de un formulario
        document.getElementById("result").value = signature;
        // Mostramos un mensaje con elresultadode la operación
        document.getElementById("resultMessage").innerHTML = "La firma finalizó correctamente";
    }
    
    // Función que se ejecutarási el proceso de firma falla
    function showErrorFunction (type, message) {
        // Mostramos un mensaje con elresultadode la operación
        document.getElementById("resultMessage").innerHTML = "Error" + message;
    }

    // Llamamos a la operación de firma
    
    function testSign() {
        var dataB64 = 'aaa';
        var formato = '';
        
        /*
        // URL servlet TriPhaseSignatureService
        var params = 'serverUrl=' + urlmapplet +'/sign/TriPhaseSignatureService\n';
        MiniApplet.sign(
            dataB64, 
            "SHA1withRSA", 
            formato, 
            params+"format=XAdESDetached\nmode=implicit", 
            function() { alert('Exito'); }, 
            function() {alert('Fallo'); } 
        );
        */
        var signature = 'no';
        try {
            signature = MiniApplet.sign(dataB64, "SHA512withRSA", "PAdES", null);
        } catch (e) {
            // Mostramos un mensaje con el error obtenido
            document.getElementById("resultMessage").innerHTML = "Error " + message;
        }
        // Guardamos la firma en un campo de un formulario
        document.getElementById("result").value = signature;
        
        // Mostramos un mensaje con elresultadode la operación
        document.getElementById("resultMessage").innerHTML = "La firma finalizó correctamente";
    }
  </script>


  <?php
  
  $item = new item_avotable();
  $item->data = $propuesta;  
  echo $item->__toString();

    
    