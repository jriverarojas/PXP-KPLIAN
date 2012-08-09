<?php
/**
*@package pXP
*@file gen-MODEstado.php
*@author  (rortiz)
*@date 22-11-2011 15:48:00
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODEstado extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarEstado(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='sast.ft_estado_sel';
		$this->transaccion='ST_EST_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_estado','int4');
		$this->captura('nombre','varchar');
		$this->captura('orden','int4');
		$this->captura('codigo','varchar');
		$this->captura('id_usuario_reg','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarEstado(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='sast.ft_estado_ime';
		$this->transaccion='ST_EST_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('orden','orden','int4');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('codigo','codigo','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarEstado(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='sast.ft_estado_ime';
		$this->transaccion='ST_EST_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_estado','id_estado','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('orden','orden','int4');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('codigo','codigo','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarEstado(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='sast.ft_estado_ime';
		$this->transaccion='ST_EST_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_estado','id_estado','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>