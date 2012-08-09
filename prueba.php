<?php
	include_once('lib/DatosGenerales.php');
	echo $ip = $_SERVER['SERVER_ADDR'] . "<BR>"; //Esto da la ip del Servidor. 
	
	if($_SERVER['SERVER_ADDR']==$_SESSION['_HOST']){
		//parametros a pasar usuario, contraeña, ip_web, ip_bd ,ruta_bd(data), ruta script (/usr/local/lib)
		
		$res=exec('sudo /usr/local/lib/./phxweb.sh');
		//$res=system('sudo /usr/local/lib/./phxweb.sh.sh');
		exec('sudo /usr/local/lib/./phxweb.sh', $array_salida, $resul);
		$procesos = implode("|", $array_salida);
		echo $procesos;
		
		
		echo 'XXXXXXXXXXXXXXXX';
		
	}
	else{
		echo "distintos servidores <BR>";
	}
	
?>