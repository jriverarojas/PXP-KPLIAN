<?php
/**
**********************************************************
Nombre de archivo:	    ActionArmafoto.php
Prop�sito:				impirme fotos a partir de un archivo temporal
Tabla:					tad_tad_cotizacion_det
Par�metros:				$nombre
						

Valores de Retorno:    	N�mero de registros guardados
Fecha de Creaci�n:		2008-05-28 17:32:13
Versi�n:				1.0.0
Autor:					Rensi Arteaga Copari
**********************************************************
*/
session_start();
// Convert to binary and send to the browser
//header('Content-type: image/jpeg');
echo $_SESSION['foto'][$_GET['nombre']];
exit;
?>