<?php
/**
*@package pXP
*@file gen-MODEstadoProceso.php
*@author  (mflores)
*@date 12-12-2011 09:35:55
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODEstadoProceso extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function dibujaGrafico()
	{
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='saj.f_testado_proceso_sel';
		$this->transaccion='AJ_ESTPRO_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_estado_proceso','int4');
		$this->captura('id_proceso_contrato','int4');
		$this->captura('observaciones','varchar');
		$this->captura('fecha_ini','date');
		$this->captura('responsable','text');
		$this->captura('fecha_fin','date');
		$this->captura('vigente','varchar');
		//$this->captura('anterior','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('fecha_reg','date');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_mod','date');
		$this->captura('id_usuario_mod','int4');		
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();		
		$this->ejecutarConsulta();
		
		//echo $this->getConsulta(); exit;
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
}
?>