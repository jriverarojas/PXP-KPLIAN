<?php
/**
*@package pXP
*@file gen-MODTipoArchivo.php
*@author  (mflores)
*@date 23-11-2011 10:48:12
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODTipoArchivo extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarTipoArchivo(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_tipo_archivo_sel';
		$this->transaccion='HD_TIPAR_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_tipo_archivo','int4');
		$this->captura('patron_nombre_archivo','varchar');
		$this->captura('num_file_ini','int4');
		$this->captura('fecha_fin','date');
		$this->captura('periodo','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('fecha_ini','date');
		$this->captura('id_estacion','int4');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('fecha_mod','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('codigo','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarTipoArchivo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_archivo_ime';
		$this->transaccion='HD_TIPAR_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('patron_nombre_archivo','patron_nombre_archivo','varchar');
		$this->setParametro('num_file_ini','num_file_ini','int4');
		$this->setParametro('fecha_fin','fecha_fin','date');
		$this->setParametro('periodo','periodo','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('fecha_ini','fecha_ini','date');
		$this->setParametro('id_estacion','id_estacion','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarTipoArchivo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_archivo_ime';
		$this->transaccion='HD_TIPAR_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_archivo','id_tipo_archivo','int4');
		$this->setParametro('patron_nombre_archivo','patron_nombre_archivo','varchar');
		$this->setParametro('num_file_ini','num_file_ini','int4');
		$this->setParametro('fecha_fin','fecha_fin','date');
		$this->setParametro('periodo','periodo','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('fecha_ini','fecha_ini','date');
		$this->setParametro('id_estacion','id_estacion','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarTipoArchivo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_archivo_ime';
		$this->transaccion='HD_TIPAR_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_archivo','id_tipo_archivo','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>