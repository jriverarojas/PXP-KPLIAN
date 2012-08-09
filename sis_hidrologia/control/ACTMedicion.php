<?php
/**
*@package pXP
*@file gen-ACTMedicion.php
*@author  (mflores)
*@date 07-09-2011 15:50:29
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTMedicion extends ACTbase{    
			
	function listarMedicion(){
		$this->objParam->defecto('ordenacion','id_medicion');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		if($this->objParam->getParametro('id_sensor')!='')
		{
			$this->objParam->addFiltro("sen.id_sensor = ".$this->objParam->getParametro('id_sensor'));	
		}	
					
		if ($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid')
		{
            $this->objReporte=new Reporte($this->objParam);
            $this->res=$this->objReporte->generarReporteListado('FuncionesHidrologia','listarSensor');
        }
        else 
        {
        	$this->objFunc=new FuncionesHidrologia();	
			$this->res=$this->objFunc->listarMedicion($this->objParam);
        }
        
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarMedicion(){
		$this->objFunc=new FuncionesHidrologia();	
		if($this->objParam->insertar('id_medicion')){
			$this->res=$this->objFunc->insertarMedicion($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarMedicion($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarMedicion(){
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->eliminarMedicion($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>