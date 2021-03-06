<?php
/**
*@package pXP
*@file gen-MODModalidad.php
*@author  (mzm)
*@date 11-11-2011 15:23:06
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/
class MODModalidad extends MODbase{
	
	function __construct(CTParametro $pParam){ 
		parent::__construct($pParam);
	}
			
	function listarModalidad(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='saj.f_tmodalidad_sel';
		$this->transaccion='SAJ_MODALI_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_modalidad','int4');
		$this->captura('nombre','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','date');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','date');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarModalidad(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_tmodalidad_ime';
		$this->transaccion='SAJ_MODALI_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarModalidad(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_tmodalidad_ime';
		$this->transaccion='SAJ_MODALI_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_modalidad','id_modalidad','int4');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarModalidad(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_tmodalidad_ime';
		$this->transaccion='SAJ_MODALI_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_modalidad','id_modalidad','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>