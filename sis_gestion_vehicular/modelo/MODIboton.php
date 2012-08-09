<?php
/**
*@package pXP
*@file gen-MODIboton.php
*@author  (rcm)
*@date 04-02-2012 19:23:49
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODIboton extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarIboton(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='gev.f_tgv_iboton_sel';
		$this->transaccion='tgv_IBUT_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_iboton','int4');
		$this->captura('id_funcionario','int4');
		$this->captura('codigo','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('desc_funcionario','text');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarIboton(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_iboton_ime';
		$this->transaccion='tgv_IBUT_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_funcionario','id_funcionario','int4');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarIboton(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_iboton_ime';
		$this->transaccion='tgv_IBUT_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_iboton','id_iboton','int4');
		$this->setParametro('id_funcionario','id_funcionario','int4');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarIboton(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_iboton_ime';
		$this->transaccion='tgv_IBUT_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_iboton','id_iboton','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>