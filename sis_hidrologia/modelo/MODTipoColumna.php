<?php
/**
*@package pXP
*@file gen-MODTipoColumna.php
*@author  (mflores)
*@date 15-03-2012 10:27:40
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODTipoColumna extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarTipoColumna(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_tipo_columna_sel';
		$this->transaccion='HD_TIPCOL_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_tipo_columna','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('codigo','varchar');
		$this->captura('tipo_dato','varchar');
		$this->captura('nombre_columna','varchar');
		$this->captura('tipo_columna','varchar');
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
			
	function insertarTipoColumna(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_columna_ime';
		$this->transaccion='HD_TIPCOL_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('tipo_dato','tipo_dato','varchar');
		$this->setParametro('nombre_columna','nombre_columna','varchar');
		$this->setParametro('tipo_columna','tipo_columna','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarTipoColumna(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_columna_ime';
		$this->transaccion='HD_TIPCOL_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_columna','id_tipo_columna','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('tipo_dato','tipo_dato','varchar');
		$this->setParametro('nombre_columna','nombre_columna','varchar');
		$this->setParametro('tipo_columna','tipo_columna','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarTipoColumna(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_columna_ime';
		$this->transaccion='HD_TIPCOL_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_columna','id_tipo_columna','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>