<?php

session_start();
$nombre_archivo='ActionGrafico.php';
include_once('../../../lib/lib_general/Mensaje.php');
if($_SESSION["autentificado"] == "SI"){
	
	include_once('../../modelo/FuncionesLegal.php');	
	include_once('../../../lib/lib_control/parametro.php');
	
	$Seguridad=new FuncionesLegal();
	
	$param=new Parametro('SEL','id_estado_requerimiento','ASC',0,50,$filter,$par_combo,$query);
	$param->addFiltro("id_requerimiento=$id_requerimiento");
	$res=$Seguridad->listarReporteHistorial($param);
	
	$_SESSION['historial']=$res->getDatos();
	/*var_dump($_SESSION['historial']);
	exit();*/
	$_SESSION['nro_requerimiento']=$nro_requerimiento;
	$_SESSION['nombre_unidad']=$nombre_unidad;
	
	header("location: ../../vista/_reportes/Grafico.php");
		
}
else{
	$res=new Mensaje();
	$res->setMensaje('ERROR',$nombre_archivo,'Usuario no autentificado','Usuario no autentificado','control','','','','');
	$res->imprimirRespuesta($res->generarJson(),"401");
}



?>
