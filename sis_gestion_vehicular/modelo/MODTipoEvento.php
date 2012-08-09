<?php
/**
*@package pXP
*@file gen-MODTipoEvento.php
*@author  (rcm)
*@date 02-02-2012 01:00:14
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODTipoEvento extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarTipoEvento(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='gev.f_tgv_tipo_evento_sel';
		$this->transaccion='tgv_TIPEVE_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_tipo_evento','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('codigo','varchar');
		$this->captura('nombre','varchar');
		$this->captura('id_usuario_reg','int4');
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
			
	function insertarTipoEvento(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_tipo_evento_ime';
		$this->transaccion='tgv_TIPEVE_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('nombre','nombre','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarTipoEvento(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_tipo_evento_ime';
		$this->transaccion='tgv_TIPEVE_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_evento','id_tipo_evento','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('nombre','nombre','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarTipoEvento(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_tipo_evento_ime';
		$this->transaccion='tgv_TIPEVE_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_evento','id_tipo_evento','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>