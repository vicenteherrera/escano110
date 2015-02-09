<?php 
$pre='';$i=1;while($i++<6&&!is_file($pre.'_inc/config.inc.php')){$pre.='../';}
require_once($pre.'_inc/config.inc.php');
?>