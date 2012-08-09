<?php
/**
*@package pXP
*@file gen-MODSensor.php
*@author  (mflores)
*@date 06-09-2011 11:45:42
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODSensor extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarSensor(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_sensor_sel';
		$this->transaccion='HD_SEN_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_sensor','int4');
		$this->captura('estado','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('fecha_fin','date');
		$this->captura('fecha_ini','date');
		$this->captura('ficticio','boolean');
		$this->captura('id_estacion','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('id_tipo_sensor','int4');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('estacion','varchar');	
		$this->captura('tipo_sensor','varchar');	
		//$this->captura('nombre_medida','varchar');
		$this->captura('codigo','varchar');		
		$this->captura('unidad_medida','varchar');
		$this->captura('sen_asociado','varchar');
		$this->captura('tipo_sensor_codigo','varchar');
		
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
 
	function listarSensorCombo()
	{
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_sensor_sel';
		$this->transaccion='HD_SENC_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		$this->setParametro('id_estacion','id_estacion','int4');
				
		//Definicion de la lista del resultado del query
		$this->captura('id_sensor','int4');
		$this->captura('estado','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('fecha_fin','date');
		$this->captura('fecha_ini','date');
		$this->captura('ficticio','boolean');
		$this->captura('id_estacion','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('id_tipo_sensor','int4');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('estacion','varchar');	
		$this->captura('tipo_sensor','varchar');	
		//$this->captura('nombre_medida','varchar');
		$this->captura('codigo','varchar');		
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//echo $this->getConsulta(); exit;
		
		//Devuelve la respuesta
		return $this->respuesta;
	}

	function listarSensorFicticio()
	{
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_sensor_sel';
		$this->transaccion='HD_SENFIC_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		//$this->setParametro('id_estacion','id_estacion','int4');
				
		//Definicion de la lista del resultado del query
		$this->captura('id_sensor','int4');
		$this->captura('estado','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('fecha_fin','date');
		$this->captura('fecha_ini','date');
		$this->captura('ficticio','boolean');
		$this->captura('id_estacion','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('id_tipo_sensor','int4');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('estacion','varchar');	
		$this->captura('tipo_sensor','varchar');	
		//$this->captura('nombre_medida','varchar');
		$this->captura('codigo','varchar');
		//$this->captura('id_sensor_fk','int4');		
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//echo $this->getConsulta(); exit;
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarSensor(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_sensor_ime';
		$this->transaccion='HD_SEN_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado','estado','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('fecha_fin','fecha_fin','date',true);
		$this->setParametro('fecha_ini','fecha_ini','date',true);
		$this->setParametro('ficticio','ficticio','boolean');
		$this->setParametro('id_estacion','id_estacion','int4');
		$this->setParametro('id_tipo_sensor','id_tipo_sensor','int4');
		$this->setParametro('id_sensor_fk','id_sensor_fk','int4');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarSensor(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_sensor_ime';
		$this->transaccion='HD_SEN_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_sensor','id_sensor','int4');
		$this->setParametro('estado','estado','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('fecha_fin','fecha_fin','date');
		$this->setParametro('fecha_ini','fecha_ini','date');
		$this->setParametro('ficticio','ficticio','boolean');
		$this->setParametro('id_estacion','id_estacion','int4');
		$this->setParametro('id_tipo_sensor','id_tipo_sensor','int4');
		$this->setParametro('id_sensor_fk','id_sensor_fk','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarSensor(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_sensor_ime';
		$this->transaccion='HD_SEN_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_sensor','id_sensor','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}			
}
?>