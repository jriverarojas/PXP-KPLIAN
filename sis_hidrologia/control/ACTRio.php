<?php
/**
*@package pXP
*@file ACTRio.php
*@author  (rac)
*@date 31-08-2011 11:15:11
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTRio extends ACTbase{    
			
	function listarRio(){
		
	
		
		$this->objParam->defecto('ordenacion','id_rio');

		$this->objParam->defecto('dir_ordenacion','asc');
		
		
	   if ($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
            $this->objReporte=new Reporte($this->objParam);
            $this->res=$this->objReporte->generarReporteListado('FuncionesHidrologia','listarRio');
        }
        else {
            $this->objFunc=new FuncionesHidrologia();	
		    $this->res=$this->objFunc->listarRio($this->objParam);
        }
		
					
		
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarRio(){
		$this->objFunc=new FuncionesHidrologia();	
		if($this->objParam->insertar('id_rio')){
			$this->res=$this->objFunc->insertarRio($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarRio($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarRio(){
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->eliminarRio($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>