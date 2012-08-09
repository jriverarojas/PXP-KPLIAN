<?php
/**
*@package pXP
*@file gen-ACTTipoColumnaSensor.php
*@author  (mflores)
*@date 15-03-2012 10:27:43
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTTipoColumnaSensor extends ACTbase{    
			
	function listarTipoColumnaSensor(){
		$this->objParam->defecto('ordenacion','id_tipo_columna_sensor');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesHidrologia','listarTipoColumnaSensor');
		} else{
			$this->objFunc=new FuncionesHidrologia();	
			$this->res=$this->objFunc->listarTipoColumnaSensor($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarTipoColumnaSensor(){
		$this->objFunc=new FuncionesHidrologia();	
		if($this->objParam->insertar('id_tipo_columna_sensor')){
			$this->res=$this->objFunc->insertarTipoColumnaSensor($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarTipoColumnaSensor($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarTipoColumnaSensor(){
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->eliminarTipoColumnaSensor($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>