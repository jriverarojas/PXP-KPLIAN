<?php
/**
*@package pXP
*@file gen-MODImportarFacturResum.php
*@author  (jmita)
*@date 19-10-2011 10:41:58
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODImportarFacturResum extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarImportarFacturResum(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_sistema_dist_usuario_sel';
		$this->transaccion='CB_USHAB_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_sistema_dist_usuario','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('id_usuario','int4');
		$this->captura('desc_usuario','text');
		$this->captura('id_sistema_dist','int4');
		$this->captura('nombre_sisdis','varchar');
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
	
	function listarFacturacionPeriodo(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_sistema_dist_usuario_sel';
		$this->transaccion='CB_FACPER_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('periodo','numeric');
		$this->captura('gestion','numeric');
		$this->captura('cant_clientes','bigint');
		$this->captura('importe_total','numeric');
				
		//Ejecuta la instruccion 
		$this->armarConsulta();
		// echo $this->getConsulta(); exit; 
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
}
?>