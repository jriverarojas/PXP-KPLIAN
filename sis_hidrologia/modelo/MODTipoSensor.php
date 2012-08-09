<?php
/**
*@package pXP
*@file gen-MODTipoSensor.php
*@author  (mflores)
*@date 15-03-2012 10:27:35
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODTipoSensor extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarTipoSensor(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_tipo_sensor_sel';
		$this->transaccion='HD_TIPSEN_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_tipo_sensor','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('abreviacion','varchar');
		//$this->captura('tipo_dato','enum_tipo_dato');
		$this->captura('codigo','varchar');
		//$this->captura('equivalente_hidra','varchar');
		$this->captura('descrip','text');
		$this->captura('nombre_sensor','varchar');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('estado_ts','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		//echo $this->getConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarTipoSensor(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_sensor_ime';
		$this->transaccion='HD_TIPSEN_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('abreviacion','abreviacion','varchar');
		//$this->setParametro('tipo_dato','tipo_dato','enum_tipo_dato');
		$this->setParametro('codigo','codigo','varchar');
		//$this->setParametro('equivalente_hidra','equivalente_hidra','varchar');
		$this->setParametro('descrip','descrip','text');
		$this->setParametro('nombre_sensor','nombre_sensor','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarTipoSensor(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_sensor_ime';
		$this->transaccion='HD_TIPSEN_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_sensor','id_tipo_sensor','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('abreviacion','abreviacion','varchar');
		//$this->setParametro('tipo_dato','tipo_dato','enum_tipo_dato');
		$this->setParametro('codigo','codigo','varchar');
		//$this->setParametro('equivalente_hidra','equivalente_hidra','varchar');
		$this->setParametro('descrip','descrip','text');
		$this->setParametro('nombre_sensor','nombre_sensor','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarTipoSensor(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_sensor_ime';
		$this->transaccion='HD_TIPSEN_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_sensor','id_tipo_sensor','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}

    function genTable(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_sensor_ime';
		$this->transaccion='HD_GENTAB_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_sensor','id_tipo_sensor','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>