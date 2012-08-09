<?php
/**
*@package pXP
*@file gen-ACTHdAdministradorHidro.php
*@author  (rac)
*@date 31-08-2011 11:15:21
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTAdministradorHidro extends ACTbase{    
			
	function listarAdministradorHidro(){
		$this->objParam->defecto('ordenacion','id_administrador');
		$this->objParam->defecto('dir_ordenacion','asc');
					
		if ($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid')
		{
            $this->objReporte=new Reporte($this->objParam);
            $this->res=$this->objReporte->generarReporteListado('FuncionesHidrologia','listarAdministradorHidro');
        }
        else 
        {	
        	$this->objFunc=new FuncionesHidrologia();	
			$this->res=$this->objFunc->listarAdministradorHidro($this->objParam);
        }
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarAdministradorHidro(){
		$this->objFunc=new FuncionesHidrologia();	
		if($this->objParam->insertar('id_administrador')){
			$this->res=$this->objFunc->insertarAdministradorHidro($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarAdministradorHidro($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarAdministradorHidro(){
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->eliminarAdministradorHidro($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>