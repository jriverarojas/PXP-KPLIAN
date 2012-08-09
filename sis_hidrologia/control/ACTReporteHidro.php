<?php

class ACTReporteHidro extends ACTbase
{				 
	function reporte_med_Hidro()
	{		
		$this->objParam->defecto('ordenacion','med.fecha_medida');
		$this->objParam->defecto('dir_ordenacion','asc');
				
		if($this->objParam->getParametro('id_sensor')!='')
		{
			$this->objParam->addFiltro("med.id_sensor = ".$this->objParam->getParametro('id_sensor'));				
		}
				
		$this->objFunc = new FuncionesHidrologia();	
		$this->res = $this->objFunc->reporte_med_Hidro($this->objParam);
		
		$this->datos = $this->res->getDatos();					
		
		//var_dump($this->datos); 
				
		$_SESSION['pdf_hidro'] = $this->datos;	 
						
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
