<?php
/**
*@package pXP
*@file gen-MODCorteMoneda.php
*@author  (fprudencio)
*@date 29-09-2011 10:47:42
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODCorteMoneda extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarCorteMoneda(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='tesoro.f_tts_corte_moneda_sel';
		$this->transaccion='TS_CORMON_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_corte','int4');
		$this->captura('importe_valor','numeric');
		$this->captura('id_moneda','int4');
		$this->captura('moneda','varchar');
		$this->captura('tipo_corte','numeric');
		$this->captura('descri_corte','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarCorteMoneda(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='tesoro.f_tts_corte_moneda_ime';
		$this->transaccion='TS_CORMON_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('importe_valor','importe_valor','numeric');
		$this->setParametro('id_moneda','id_moneda','int4');
		$this->setParametro('tipo_corte','tipo_corte','numeric');
		$this->setParametro('descri_corte','descri_corte','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarCorteMoneda(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='tesoro.f_tts_corte_moneda_ime';
		$this->transaccion='TS_CORMON_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_corte','id_corte','int4');
		$this->setParametro('importe_valor','importe_valor','numeric');
		$this->setParametro('id_moneda','id_moneda','int4');
		$this->setParametro('tipo_corte','tipo_corte','numeric');
		$this->setParametro('descri_corte','descri_corte','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarCorteMoneda(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='tesoro.f_tts_corte_moneda_ime';
		$this->transaccion='TS_CORMON_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_corte','id_corte','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>