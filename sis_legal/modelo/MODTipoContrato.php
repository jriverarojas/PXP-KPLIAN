<?php
/**
*@package pXP
*@file gen-MODTipoContrato.php
*@author  (mzm)
*@date 16-11-2011 16:54:07
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODTipoContrato extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarTipoContrato(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='saj.f_ttipo_contrato_sel';
		$this->transaccion='SA_TIPCON_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_tipo_contrato','int4');
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
			
	function insertarTipoContrato(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_ttipo_contrato_ime';
		$this->transaccion='SA_TIPCON_INS';
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
			
	function modificarTipoContrato(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_ttipo_contrato_ime';
		$this->transaccion='SA_TIPCON_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_contrato','id_tipo_contrato','int4');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarTipoContrato(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_ttipo_contrato_ime';
		$this->transaccion='SA_TIPCON_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_contrato','id_tipo_contrato','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>