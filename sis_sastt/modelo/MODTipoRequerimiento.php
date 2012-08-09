<?php
/**
*@package pXP
*@file gen-MODTipoRequerimiento.php
*@author  (rortiz)
*@date 17-11-2011 16:29:57
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODTipoRequerimiento extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarTipoRequerimiento(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='sast.ft_tipo_requerimiento_sel';
		$this->transaccion='ST_TIPREQ_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_tipo_requerimiento','int4');
		$this->captura('nombre','varchar');
		$this->captura('estado_reg','varchar');
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
			
	function insertarTipoRequerimiento(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='sast.ft_tipo_requerimiento_ime';
		$this->transaccion='ST_TIPREQ_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('nombre','nombre','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarTipoRequerimiento(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='sast.ft_tipo_requerimiento_ime';
		$this->transaccion='ST_TIPREQ_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_requerimiento','id_tipo_requerimiento','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('nombre','nombre','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarTipoRequerimiento(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='sast.ft_tipo_requerimiento_ime';
		$this->transaccion='ST_TIPREQ_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_requerimiento','id_tipo_requerimiento','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>