<?php
/**
*@package pXP
*@file gen-ACTProcesoContrato.php
*@author  (mzm)
*@date 16-11-2011 17:25:24
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTProcesoContrato extends ACTbase{    
			
	function listarProcesoContrato(){
		$this->objParam->defecto('ordenacion','id_proceso_contrato');

		$this->objParam->defecto('dir_ordenacion','asc');
        //agregamos el identificador de usuario		
		$this->objParam->addParametro('id_funcionario',$_SESSION['ss_id_funcionario']);
		
		
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesLegal','listarProcesoContrato');
		} else{
			$this->objFunc=new FuncionesLegal();	
			$this->res=$this->objFunc->listarProcesoContrato($this->objParam);
		}
		
		
		///////////
		/*
		$destinatario = "rensi4rn@gmail.com";
		$asunto = "Este mensaje es de prueba";
		$cuerpo = '
		<html>
		<head>
		   <title>Prueba de correo</title>
		</head>
		<body>
		<h1>Hola amigos!</h1>
		<p>
		<b>Bienvenidos a mi correo electrónico de prueba</b>. Estoy encantado de tener tantos lectores. Este cuerpo del mensaje es del artículo de envío de mails por PHP. Habría que cambiarlo para poner tu propio cuerpo. Por cierto, cambia también las cabeceras del mensaje.
		</p>
		</body>
		</html>
		';
		
		//para el envío en formato HTML
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		
		//dirección del remitente
		$headers .= "From: Rensi Arteaga Copari <rensi@kplian.com>\r\n";
		
		//dirección de respuesta, si queremos que sea distinta que la del remitente
		$headers .= "Reply-To: rensi@kplian.com\r\n";
		
		//ruta del mensaje desde origen a destino
		$headers .= "Return-path: rensi@kplian.com\r\n";
		
		
		
		mail($destinatario,$asunto,$cuerpo,$headers);*/
		
		
		
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarProcesoContrato(){
		$this->objFunc=new FuncionesLegal();	
		if($this->objParam->insertar('id_proceso_contrato')){
			$this->res=$this->objFunc->insertarProcesoContrato($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarProcesoContrato($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}


	function eliminarProcesoContrato(){
		$this->objFunc=new FuncionesLegal();	
		$this->res=$this->objFunc->eliminarProcesoContrato($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	
	function subirContrato(){
	
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		$this->objFunSeguridad=new FuncionesLegal();
		$this->res=$this->objFunSeguridad->subirContrato($this->objParam);
		//imprime respuesta en formato JSON
		$this->res->imprimirRespuesta($this->res->generarJson());

	}
	
			
}

?>