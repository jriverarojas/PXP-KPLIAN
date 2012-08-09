<?php
/**
*@package pXP
*@file gen-MODUnidadMedida.php
*@author  (mflores)
*@date 02-04-2012 17:34:59
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODUnidadMedida extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarUnidadMedida(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_unidad_medida_sel';
		$this->transaccion='HD_UNIMED_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		//$this->captura('id_unidad_medida','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('simbolo','varchar');
		$this->captura('unidad_medida','varchar');
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
			
	function insertarUnidadMedida(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_unidad_medida_ime';
		$this->transaccion='HD_UNIMED_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('simbolo','simbolo','varchar');
		$this->setParametro('unidad_medida','unidad_medida','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//echo $this->getConsulta(); exit;

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarUnidadMedida(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_unidad_medida_ime';
		$this->transaccion='HD_UNIMED_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		//$this->setParametro('id_unidad_medida','id_unidad_medida','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('simbolo','simbolo','varchar');
		$this->setParametro('unidad_medida','unidad_medida','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarUnidadMedida(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_unidad_medida_ime';
		$this->transaccion='HD_UNIMED_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		//$this->setParametro('id_unidad_medida','id_unidad_medida','int4');
		$this->setParametro('simbolo','simbolo','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>