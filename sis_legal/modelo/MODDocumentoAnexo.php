<?php
/**
*@package pXP
*@file gen-MODDocumentoAnexo.php
*@author  (fprudencio)
*@date 17-11-2011 10:24:34
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODDocumentoAnexo extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarDocumentoAnexo(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='saj.ft_documento_anexo_sel';
		$this->transaccion='SA_DOCANEX_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_documento_anexo','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('id_proceso_contrato','int4');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','date');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','date');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarDocumentoAnexo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.ft_documento_anexo_ime';
		$this->transaccion='SA_DOCANEX_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_proceso_contrato','id_proceso_contrato','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarDocumentoAnexo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.ft_documento_anexo_ime';
		$this->transaccion='SA_DOCANEX_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_documento_anexo','id_documento_anexo','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_proceso_contrato','id_proceso_contrato','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarDocumentoAnexo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.ft_documento_anexo_ime';
		$this->transaccion='SA_DOCANEX_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_documento_anexo','id_documento_anexo','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>