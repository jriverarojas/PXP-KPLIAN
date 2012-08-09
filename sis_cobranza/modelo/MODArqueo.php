<?php
/**
*@package pXP
*@file gen-MODArqueo.php
*@author  (fprudencio)
*@date 27-09-2011 11:02:53
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODArqueo extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarArqueo(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_arqueo_sel';
		$this->transaccion='CB_ARQ_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_arqueo','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('observaciones','varchar');
		$this->captura('estado','varchar');
		$this->captura('id_caja','int4');
		$this->captura('codigo','varchar');
		$this->captura('fecha','date');
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
			
	function insertarArqueo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_arqueo_ime';
		$this->transaccion='CB_ARQ_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('observaciones','observaciones','varchar');
		$this->setParametro('estado','estado','varchar');
		$this->setParametro('id_caja','id_caja','int4');
		$this->setParametro('fecha','fecha','date');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarArqueo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_arqueo_ime';
		$this->transaccion='CB_ARQ_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_arqueo','id_arqueo','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('observaciones','observaciones','varchar');
		$this->setParametro('estado','estado','varchar');
		$this->setParametro('id_caja','id_caja','int4');
		$this->setParametro('fecha','fecha','date');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarArqueo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_arqueo_ime';
		$this->transaccion='CB_ARQ_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_arqueo','id_arqueo','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
	function revisarArqueo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_arqueo_ime';
		$this->transaccion='CB_REV_ARQUEO';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_arqueo','id_arqueo','int4');
		$this->setParametro('operacion','operacion','varchar');
		

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>