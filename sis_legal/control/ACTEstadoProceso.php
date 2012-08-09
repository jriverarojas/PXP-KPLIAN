<?php
//session_start();

include_once('../../lib/lib_general/funciones.inc.php');
	
//Dibuja el diagrama de gantt
//dibujaGrafico();

class ACTEstadoProceso extends ACTbase
{				 
	function dibujaGrafico()
	{			
		$this->objParam->defecto('ordenacion','id_proceso_contrato');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		if($this->objParam->getParametro('id_proceso_contrato')!='')
		{
			$this->objParam->addFiltro("estpro.id_proceso_contrato = ".$this->objParam->getParametro('id_proceso_contrato'));	
		}
		
		$_SESSION['numero_requerimiento'] = $this->objParam->getParametro('numero_requerimiento');
		$_SESSION['desc_uo'] = $this->objParam->getParametro('desc_uo');
		$_SESSION['desc_tipo_contrato'] = $this->objParam->getParametro('desc_tipo_contrato');
		
		$this->objFunc = new FuncionesLegal();	
		$this->res = $this->objFunc->dibujaGrafico($this->objParam);				
		
		$this->datos = $this->res->getDatos();	
		$tamanio = sizeof($this->datos);
		
		$_SESSION['gantt'] = $this->datos;	
				
		$mensajeExito=new Mensaje();
		
		/*$mis_ciudades = array(
        "madrid"=>"madrid",
        "cataluña"=>"barcelona",
        "aragon"=>"zaragoza");
		$mensajeExito->setDatos($mis_ciudades);*/
		
		$mensajeExito->setDatos($this->datos);
		
		$mensajeExito->setMensaje('EXITO',
		                          'EstadoProceso.php',
		                          'Se genero con exito el reporte',
								  'Se genero con exito el reporte','control');
				
		$mensajeExito->setTipoTransaccion('SEL');		
					
		$mensajeExito->imprimirRespuesta($mensajeExito->generarJson());							
	}			
}
?>