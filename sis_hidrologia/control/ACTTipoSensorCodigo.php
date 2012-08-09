<?php
/**
*@package pXP
*@file gen-ACTTipoColumnaSensor.php
*@author  (mflores)
*@date 15-03-2012 10:27:43
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTTipoSensorCodigo extends ACTbase{    
			
	function listarTipoSensorCodigo(){
		//$this->objParam->defecto('ordenacion','id_tipo_sensor_columna');

		//$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesHidrologia','listarTipoSensorCodigo');
		} else{
			$this->objFunc=new FuncionesHidrologia();	
			$this->res=$this->objFunc->listarTipoSensorCodigo($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarTipoSensorCodigo(){
		$this->objFunc=new FuncionesHidrologia();
		
		$id33 = $this->objParam->getParametro('id_tipo_sensor');
		$codigo=$id33['tipo_sensor_codigo'];
		
		
		$id334 = $this->objParam->getParametro(0);
		
		
		

		
		if(!isset($id334)){
		   $codigo= $this->objParam->getParametro('tipo_sensor_codigo');
			
		}
		
			

		
	
		if($this->objParam->insertar('id_tipo_sensor_'.$codigo)){
			$this->res=$this->objFunc->insertarTipoSensorCodigo($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarTipoSensorCodigo($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarTipoSensorCodigo(){
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->eliminarTipoSensorCodigo($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	
	function subirExcelDinamico()
	{
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->subirExcelDinamico($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	
	function reporteTipoSensorCodigo()
	{
		
		ob_start();
		$fb=FirePHP::getInstance(true);
			
		$codigo_fecha= $this->objParam->getParametro('tipo_columna_sensor_fecha');
		
		$codigo_valor= $this->objParam->getParametro('tipo_columna_sensor_valor');
		
		
		
		$this->objParam->defecto('ordenacion',$codigo_fecha);
		$this->objParam->defecto('dir_ordenacion','asc');
				
				
		$this->objFunc = new FuncionesHidrologia();	
		$this->res = $this->objFunc->listarTipoSensorCodigoReporte($this->objParam);
		
		$this->datos = $this->res->getDatos();					
		//var_dump($this->datos); 
		$_SESSION['pdf_hidro'] = $this->datos;
		
		
		$fb->log($_SESSION['pdf_hidro'],"direccion");

		// $this->res->imprimirRespuesta($this->res->generarJson());
	 
		$mensajeExito=new Mensaje();
		$mensajeExito->setDatos($this->datos);
		$mensajeExito->setMensaje('EXITO',
		                          'ReporteHidro.php',
		                          'Se genero con exito el reporte',
								  'Se genero con exito el reporte','control');
		$mensajeExito->setTipoTransaccion('SEL');		
		$mensajeExito->imprimirRespuesta($mensajeExito->generarJson());
	}
	
	function promedioTipoSensorCodigo()
	{
		
		ob_start();
		$fb=FirePHP::getInstance(true);
			
		$codigo_fecha= $this->objParam->getParametro('tipo_columna_sensor_fecha');
		
		$codigo_valor= $this->objParam->getParametro('tipo_columna_sensor_valor');
		
		
		
		$this->objParam->defecto('ordenacion',$codigo_fecha);
		$this->objParam->defecto('dir_ordenacion','asc');
				
				
		$this->objFunc = new FuncionesHidrologia();	
		$this->res = $this->objFunc->promedioTipoSensorCodigoReporte($this->objParam);
		
		$this->datos = $this->res->getDatos();					
		//var_dump($this->datos); 
		$_SESSION['pdf_hidro_promedio'] = $this->datos;
		
		
		$fb->log($_SESSION['pdf_hidro'],"direccion");

		// $this->res->imprimirRespuesta($this->res->generarJson());
	 
		$mensajeExito=new Mensaje();
		$mensajeExito->setDatos($this->datos);
		$mensajeExito->setMensaje('EXITO',
		                          'ReporteHidro.php',
		                          'Se genero con exito el reporte',
								  'Se genero con exito el reporte','control');
		$mensajeExito->setTipoTransaccion('SEL');		
		$mensajeExito->imprimirRespuesta($mensajeExito->generarJson());
	}
			
}

?>