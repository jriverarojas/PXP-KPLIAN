<?php
/**
*@package pXP
*@file gen-MODCaja.php
*@author  (fprudencio)
*@date 26-09-2011 18:19:13
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODCaja extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarCaja(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_caja_sel';
		$this->transaccion='CB_CAJA_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_caja','int4');
		$this->captura('observaciones','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('id_agencia','int4');
		$this->captura('institucion','varchar');
		$this->captura('estado_caja','varchar');
		$this->captura('codigo','varchar');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('cod_agencia','varchar');
		$this->captura('desc_agencia','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		//echo $this->getConsulta(); exit;
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarCaja(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_caja_ime';
		$this->transaccion='CB_CAJA_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('observaciones','observaciones','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_agencia','id_agencia','int4');
		$this->setParametro('estado_caja','estado_caja','varchar');
		$this->setParametro('codigo','codigo','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarCaja(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_caja_ime';
		$this->transaccion='CB_CAJA_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_caja','id_caja','int4');
		$this->setParametro('observaciones','observaciones','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_agencia','id_agencia','int4');
		$this->setParametro('estado_caja','estado_caja','varchar');
		$this->setParametro('codigo','codigo','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarCaja(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_caja_ime';
		$this->transaccion='CB_CAJA_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_caja','id_caja','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}

	function abrirCaja(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_caja_ime';
		$this->transaccion='CB_ABRIR_CAJA';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_caja','id_caja','int4');
		$this->setParametro('operacion','operacion','varchar');
		

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
}
?>