<?php
/**
*@package pXP
*@file gen-MODPrueba.php
*@author  (admin)
*@date 17-08-2011 17:57:05
*@description Clase que envía los parámetros requeridos a la Base de datos para la ejecución de las funciones, y que recibe la respuesta del resultado de la ejecución de las mismas
*/

class MODPrueba extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarPrueba(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_prueba_sel';
		$this->transaccion='CB_PRUEBA_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_prueba','int4');
		$this->captura('empleado','bool');
		$this->captura('estado','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('fecha','date');
		$this->captura('nombre','varchar');
		$this->captura('sueldo','numeric');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('id_usuario_mod','int4');

		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarPrueba(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_prueba_ime';
		$this->transaccion='CB_PRUEBA_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('empleado','empleado','bool');
		$this->setParametro('estado','estado','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('fecha','fecha','date');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('sueldo','sueldo','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarPrueba(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_prueba_ime';
		$this->transaccion='CB_PRUEBA_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_prueba','id_prueba','int4');
		$this->setParametro('empleado','empleado','bool');
		$this->setParametro('estado','estado','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('fecha','fecha','date');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('sueldo','sueldo','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarPrueba(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_prueba_ime';
		$this->transaccion='CB_PRUEBA_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_prueba','id_prueba','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>