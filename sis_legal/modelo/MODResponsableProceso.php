<?php
/**
*@package pXP
*@file gen-MODResponsableProceso.php
*@author  (mzm)
*@date 16-11-2011 16:54:59
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODResponsableProceso extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarResponsableProceso(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='saj.f_tresponsable_proceso_sel';
		$this->transaccion='SA_RESPRO_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		
		$this->setParametro('tipo','tipo','varchar');	
		//Definicion de la lista del resultado del query
		$this->captura('id_responsable_proceso','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('tipo','varchar');
		$this->captura('id_funcionario','int4');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','date');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','date');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('nombre_completo1','text');
		$this->captura('tiene_procesos_pendientes','int4');
		$this->captura('desc_resp_ant','text');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarResponsableProceso(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_tresponsable_proceso_ime';
		$this->transaccion='SA_RESPRO_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('tipo','tipo','varchar');
		$this->setParametro('id_funcionario','id_funcionario','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarResponsableProceso(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_tresponsable_proceso_ime';
		$this->transaccion='SA_RESPRO_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_responsable_proceso','id_responsable_proceso','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('tipo','tipo','varchar');
		$this->setParametro('id_funcionario','id_funcionario','int4');
		$this->setParametro('id_funcionario_','id_funcionario_','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		
		$this->ejecutarConsulta();		
//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarResponsableProceso(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_tresponsable_proceso_ime';
		$this->transaccion='SA_RESPRO_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_responsable_proceso','id_responsable_proceso','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>