<?php

class ACTObtienePromedio extends ACTbase
{				 
	function obtener_promedio()
	{		
		$this->objParam->defecto('ordenacion','med.fecha_medida');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		//$this->objParam->getParametro('tabla'); 
		
		if($this->objParam->getParametro('id_sensor')!='')
		{
			$this->objParam->addFiltro("med.id_sensor = ".$this->objParam->getParametro('id_sensor'));				
		}
				
		$this->objFunc = new FuncionesHidrologia();	
		$this->res = $this->objFunc->obtener_promedio($this->objParam);
		
		$this->datos = $this->res->getDatos();					
		
		$_SESSION['hidro_promedios'] = $this->datos;	 
						
		$mensajeExito = new Mensaje();
				
		$mensajeExito->setDatos($this->datos);
		
		$mensajeExito->setMensaje('EXITO',
		                          'Promedios.php',
		                          'Se obtuvieron las fechas max y min',
								  'Se obtuvieron las fechas max y min','control');
				
		$mensajeExito->setTipoTransaccion('SEL');		
					
		$mensajeExito->imprimirRespuesta($mensajeExito->generarJson());
	}		
}
?>
