<?php
/**
*@package pXP
*@file gen-ACTMedicionDatoMedida.php
*@author  (mflores)
*@date 07-09-2011 15:50:29
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTMedicionDatoMedida extends ACTbase
{    
			
	function listarMedicionDatoMedida()
	{
		$this->objParam->defecto('ordenacion','fecha_medida');
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
			$this->res=$this->objFunc->listarMedicionDatoMedida($this->objParam);
        }
        
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarMedicionDatoMedida(){
		$this->objFunc=new FuncionesHidrologia();	
		if($this->objParam->insertar('id_medicion')){
			$this->res=$this->objFunc->insertarMedicionDatoMedida($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarMedicionDatoMedida($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarMedicionDatoMedida(){
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->eliminarMedicionDatoMedida($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}

	function subir_excel()
	{
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->subir_excel($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	
	function repMedidas()
	{				     		
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->repMedidas($this->objParam);
		
		//echo var_dump($this->res); exit;
		
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
}

?>