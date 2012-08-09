<?php
/**
*@package pXP
*@file gen-MODTipoColumnaSensor.php
*@author  (rac)
*@date 16-03-2012 17:06:17
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODTipoColumnaSensor extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarTipoColumnaSensor(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_tipo_columna_sensor_sel';
		$this->transaccion='HD_TICOSEN_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		$this->setParametro('id_tipo_sensor','id_tipo_sensor','integer');
		$this->setParametro('par_filtro','par_filtro','varchar');
					
		//Definicion de la lista del resultado del query
		$this->captura('id_tipo_columna_sensor','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('unidad_medida','varchar');
		$this->captura('prioridad','numeric');
		$this->captura('tipo_dato','varchar');
		$this->captura('nombre_columna','varchar');
		$this->captura('codigo_columna','varchar');
		$this->captura('id_tipo_sensor','int4');
		$this->captura('mapeo_archivo','varchar');
		$this->captura('orden','numeric');
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
			
	function insertarTipoColumnaSensor(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_columna_sensor_ime';
		$this->transaccion='HD_TICOSEN_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('unidad_medida','unidad_medida','varchar');
		$this->setParametro('prioridad','prioridad','numeric');
		$this->setParametro('tipo_dato','tipo_dato','varchar');
		$this->setParametro('nombre_columna','nombre_columna','varchar');
		$this->setParametro('codigo_columna','codigo_columna','varchar');
		$this->setParametro('id_tipo_sensor','id_tipo_sensor','int4');
		$this->setParametro('mapeo_archivo','mapeo_archivo','varchar');
		$this->setParametro('orden','orden','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarTipoColumnaSensor(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_columna_sensor_ime';
		$this->transaccion='HD_TICOSEN_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_columna_sensor','id_tipo_columna_sensor','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('unidad_medida','unidad_medida','varchar');
		$this->setParametro('prioridad','prioridad','numeric');
		$this->setParametro('tipo_dato','tipo_dato','varchar');
		$this->setParametro('nombre_columna','nombre_columna','varchar');
		$this->setParametro('codigo_columna','codigo_columna','varchar');
		$this->setParametro('id_tipo_sensor','id_tipo_sensor','int4');
		$this->setParametro('mapeo_archivo','mapeo_archivo','varchar');
		$this->setParametro('orden','orden','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarTipoColumnaSensor(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_columna_sensor_ime';
		$this->transaccion='HD_TICOSEN_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_columna_sensor','id_tipo_columna_sensor','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>