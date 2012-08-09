<?php
/**
*@package pXP
*@file gen-MODArqueoDet.php
*@author  (fprudencio)
*@date 29-09-2011 17:20:27
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODArqueoDet extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarArqueoDet(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_arqueo_det_sel';
		$this->transaccion='CB_ARQDET_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_arqueo_det','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('cantidad','int4');
		$this->captura('id_corte','int4');
		$this->captura('descri_corte','varchar');
		$this->captura('importe','numeric');
		$this->captura('id_arqueo','int4');
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
			
	function insertarArqueoDet(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_arqueo_det_ime';
		$this->transaccion='CB_ARQDET_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('cantidad','cantidad2','int4');
		$this->setParametro('id_corte','id_corte','int4');
		$this->setParametro('importe','importe','numeric');
		$this->setParametro('id_arqueo','id_arqueo','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarArqueoDet(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_arqueo_det_ime';
		$this->transaccion='CB_ARQDET_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_arqueo_det','id_arqueo_det','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('cantidad','cantidad','int4');
		$this->setParametro('id_corte','id_corte','int4');
		$this->setParametro('importe','importe','numeric');
		$this->setParametro('id_arqueo','id_arqueo','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarArqueoDet(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_arqueo_det_ime';
		$this->transaccion='CB_ARQDET_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_arqueo_det','id_arqueo_det','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>