<?php
/**
*@package pXP
*@file gen-MODArchivoSensor.php
*@author  (mflores)
*@date 23-11-2011 10:48:29
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODArchivoSensor extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarArchivoSensor(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_archivo_sensor_sel';
		$this->transaccion='HD_ARSEN_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		//$this->setParametro('id_estacion','id_estacion','int4');
				
		//Definicion de la lista del resultado del query
		$this->captura('id_archivo_sensor','int4');
		$this->captura('id_sensor','int4');
		$this->captura('orden','int4');
		$this->captura('id_tipo_archivo','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('nombre_col_file','varchar');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('fecha_mod','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('codigo','varchar');
		$this->captura('orden_col_fecha','int4');
		$this->captura('nombre_col_fecha','varchar');
		$this->captura('orden_col_hora','int4');
		$this->captura('nombre_col_hora','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarArchivoSensor(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_archivo_sensor_ime';
		$this->transaccion='HD_ARSEN_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_sensor','id_sensor','int4');
		$this->setParametro('orden','orden','int4');
		$this->setParametro('id_tipo_archivo','id_tipo_archivo','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('nombre_col_file','nombre_col_file','varchar');
		$this->setParametro('orden_col_fecha','orden_col_fecha','int4');
		$this->setParametro('nombre_col_fecha','nombre_col_fecha','varchar');
		$this->setParametro('orden_col_hora','orden_col_hora','int4');
		$this->setParametro('nombre_col_hora','nombre_col_hora','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarArchivoSensor(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_archivo_sensor_ime';
		$this->transaccion='HD_ARSEN_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_archivo_sensor','id_archivo_sensor','int4');
		$this->setParametro('id_sensor','id_sensor','int4');
		$this->setParametro('orden','orden','int4');
		$this->setParametro('id_tipo_archivo','id_tipo_archivo','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('nombre_col_file','nombre_col_file','varchar');
		$this->setParametro('orden_col_fecha','orden_col_fecha','int4');
		$this->setParametro('nombre_col_fecha','nombre_col_fecha','varchar');
		$this->setParametro('orden_col_hora','orden_col_hora','int4');
		$this->setParametro('nombre_col_hora','nombre_col_hora','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarArchivoSensor(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_archivo_sensor_ime';
		$this->transaccion='HD_ARSEN_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_archivo_sensor','id_archivo_sensor','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>