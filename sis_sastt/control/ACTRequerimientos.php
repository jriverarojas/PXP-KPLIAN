<?php
/**
*@package pXP
*@file gen-ACTRequerimientos.php
*@author  (rortiz)
*@date 22-11-2011 15:09:03
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTRequerimientos extends ACTbase{    
			
	function listarCaptura(){

		//el objeto objParam contiene todas la variables recibidad desde la interfaz
		
		// parametros de ordenacion por defecto
		$this->objParam->defecto('ordenacion','id_requerimiento');
		$this->objParam->defecto('dir_ordenacion','asc');
		$this->objParam->addParametro('id_funcionario',$_SESSION['ss_id_funcionario']);
		
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		if ($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte=new Reporte($this->objParam);
			$this->res=$this->objReporte->generarReporteListado('FuncionesSastt','listarCaptura');
		}
		else {
			$this->objFunc=new FuncionesSastt();
			$this->res=$this->objFunc->listarCaptura($this->objParam);			
		}	
		//imprime respuesta en formato JSON para enviar lo a la interface (vista)
		$this->res->imprimirRespuesta($this->res->generarJson());	
	}
	function subirCaptura(){
		$this->objFunc=new FuncionesSastt();
		$this->res=$this->objFunc->subirCaptura($this->objParam);
		//imprime respuesta en formato JSON
		$this->res->imprimirRespuesta($this->res->generarJson());

	}			
	function insertarRequerimientos(){
		$this->objFunc=new FuncionesSastt();	
		if($this->objParam->insertar('id_requerimiento')){
			$this->res=$this->objFunc->insertarRequerimientos($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarRequerimientos($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}					
	function eliminarRequerimientos(){
		$this->objFunc=new FuncionesSastt();	
		$this->res=$this->objFunc->eliminarRequerimientos($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	
}

?>