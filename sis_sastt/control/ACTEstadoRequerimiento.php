<?php
//session_start();

include_once('../../lib/lib_general/funciones.inc.php');
	
//Dibuja el diagrama de gantt
//dibujaGrafico();

class ACTEstadoRequerimiento extends ACTbase{    
				
	function dibujaGrafico()
	{
		$this->objParam->defecto('ordenacion','id_requerimiento');
		$this->objParam->defecto('dir_ordenacion','asc');

		if($this->objParam->getParametro('id_requerimiento')!='')
		{
			$this->objParam->addFiltro("estreq.id_requerimiento = ".$this->objParam->getParametro('id_requerimiento'));
		}

		$_SESSION['numero_requerimiento'] = $this->objParam->getParametro('numero_requerimiento');
		$_SESSION['requerimiento'] = $this->objParam->getParametro('requerimiento');

		$this->objFunc = new FuncionesSastt();
		$this->res = $this->objFunc->dibujaGrafico($this->objParam);

		$this->datos = $this->res->getDatos();
		//echo var_dump($this->datos); exit;
		
		$tamanio = sizeof($this->datos);

		$_SESSION['gantt'] = $this->datos;

		$mensajeExito=new Mensaje();

		$mensajeExito->setDatos($this->datos);

		$mensajeExito->setMensaje('EXITO',
		'EstadoRequerimiento.php',
		'Se genero con exito el reporte',
		'Se genero con exito el reporte','control');

		$mensajeExito->setTipoTransaccion('SEL');

		$mensajeExito->imprimirRespuesta($mensajeExito->generarJson());
	}
			
}

?>