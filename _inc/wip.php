<?php
	$wip_start = ''; $wip_end='';$system='';
	
	require dirname(__FILE__)."/wip_dates.inc.php";
	
	
//===============================================================	
	//$system = 'Sernetcanf';
	//$wip_start = '2010-07-05 12:30:00';
	//$wip_end   = '2010-07-05 14:00:00';
//===============================================================
//===============================================================
	$start = strtotime($wip_start);
	$end   = strtotime($wip_end);
	$wip = false;
	if ($start < time() && time() < $end ) {
		$wip = true;
		$title = 'Sistema en mantenimiento';
	} else {
		$wip = false;
		$title = 'Error 404: P&aacute;gina no encontrada';
	}
?>
<html>
<head>
<title><?php echo $system;?> - <?php echo $title;?></title>
<meta name="robots" content="noindex">
<style>
	* { font-family: sans-serif; font-size:12px;}
	h1 { font-size: 23px; margin-top:0 }
	h2 { font-size: 17px; }
	td { padding:5px 5px; }
	
</style>
</head>
<body>
	<div style="border:1px solid gray; padding:20px 20px; margin: 15px auto 0 auto; width:500px;">
	<h1><?php echo $system; ?></h1>
	<h2><?php echo $title; ?></h2>
	
<?php

	if ($wip) {
		
?>
	El acceso al sistema esta suspendido por labores de mantenimiento.
	<br />
	Es posible que el recurso al que está accediendo no esté disponible en este momento.<br />
	<br />
	La temporalización prevista del mantenimiento es la siguiente:<br />
	<br />

	<table style="border-color:#CCC; font-family:fixed; border-spacing: 0; border-collapse: collapse;" border=1>
	<tr><td>Inicio</td><td><?php echo date('d-m-Y H:i:s',$start);?></td></tr>
	<tr><td>Fin</td><td><?php echo date('d-m-Y H:i:s',$end);?></td></tr>
	</table>
	<br />
	Como referencia, la fecha y hora actual en el servidor es:<br />
	<br />
	<table style="border-color:#CCC; font-family:fixed; border-spacing: 0; border-collapse: collapse;" border=1>
	<tr><td>Actual</td><td><?php echo date('d-m-Y H:i:s');?></td></tr>
	</table>

	<br />
	Por favor, intente acceder de nuevo fuera del intervalo de mantenimiento.<br />
	
<?php

	} else {
	
?>
	La página que ha solicitado no se ha encontrado.<br />
	<br />
	Se ha comprobado que el sistema no está siendo actualizado.<br />
	Fecha de actualización prevista/anterior:

	<table style="border-color:#CCC;font-family:fixed; border-spacing: 0; border-collapse: collapse;" border=1>
	<tr><td>Inicio</td><td><?php echo date('d-m-Y H:i:s',$start);?></td></tr>
	<tr><td>Fin</td><td><?php echo date('d-m-Y H:i:s',$end);?></td></tr>
	<tr><td>Actual</td><td><?php echo date('d-m-Y H:i:s');?></td></tr>
	</table>

<?php

	}

?>
	</div>
	<br />
	<br />
	<br />

</body>
</html>